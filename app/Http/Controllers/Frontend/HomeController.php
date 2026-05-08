<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Enquiry;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Plan;
use App\Models\Review;
use App\Models\Service;
use App\Models\Job;
use App\Models\Career;
use App\Models\Testimonial;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.index');
    }
   
    public function careersPage()
    {
        $careers = Career::where('status', 1)->latest()->get();
        return view('frontend.careers', compact('careers'));
    }

    public function jobApply(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'regex:/^[a-zA-Z\s]+$/', // only letters
                'min:3',
                'max:50'
            ],
            'email' => 'required|email',
            'phone' => [
                'required',
                'regex:/^[0-9]{10}$/' // exactly 10 digits
            ],
            'subject' => 'required',
            'resume'  => 'required|file|mimes:pdf,doc,docx|max:5120'
        ], [
            'name.required' => 'Name is required',
            'name.regex' => 'Only letters allowed in name',
            'name.min' => 'Name must be at least 3 characters',

            'email.required' => 'Email is required',
            'email.email' => 'Enter a valid email',

            'phone.required' => 'Phone number is required',
            'phone.regex' => 'Enter valid 10-digit number',

            'subject.required' => 'Please select department',

            'resume.required' => 'Resume is required',
            'resume.mimes' => 'Only PDF, DOC, DOCX allowed',
            'resume.max' => 'Resume must not exceed 5MB',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }


        $resumeName = null;
        $filePath   = null;

        // Upload Resume
        if ($request->hasFile('resume')) {
            $resume     = $request->file('resume');
            $resumeName = time() . '_' . $resume->getClientOriginalName();
            $resume->move(public_path('resume'), $resumeName);
            $filePath = public_path('resume/' . $resumeName);
        }

        // Store in DB
        Job::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message, // ✅ add this
            'resume'  => $resumeName
        ]);
        // Notification
        storeNotification(
            'New jobs received',
            'You have received a new jobs',
            'jobs',
            1
        );

       try {

        $to = "venkadavanprojectschennai@gmail.com";
    
        // Admin Mail
        Mail::send([], [], function ($message) use ($request, $filePath, $resumeName, $to) {

        $message->to($to)
            ->from('venkadavanprojectschennai@gmail.com', 'VPPL')
            ->replyTo('venkadavanprojectschennai@gmail.com', 'VPPL')
            ->subject('New Job Application - ' . $request->name)

            ->html("
                <h2>New Job Application</h2>

                <table cellpadding='6' cellspacing='0' border='0' width='100%'>

                    <tr>
                        <td><strong>Name:</strong></td>
                        <td>{$request->name}</td>
                    </tr>

                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>{$request->email}</td>
                    </tr>

                    <tr>
                        <td><strong>Phone:</strong></td>
                        <td>{$request->phone}</td>
                    </tr>

                    <tr>
                        <td><strong>Subject:</strong></td>
                        <td>{$request->subject}</td>
                    </tr>

                    <tr>
                        <td><strong>Message:</strong></td>
                        <td>{$request->message}</td>
                    </tr>

                </table>
            ");

        // Attach Resume
        if ($filePath && file_exists($filePath)) {

            $message->attach($filePath, [
                'as' => $resumeName,
            ]);
        }
    });


    // User Mail
    Mail::send([], [], function ($message) use ($request) {

        $message->to($request->email)
            ->from('venkadavanprojectschennai@gmail.com', 'VPPL')
            ->replyTo('venkadavanprojectschennai@gmail.com', 'VPPL')
            ->subject('Thank You for Your Application')

            ->html("
                <p>Hi {$request->name},</p>

                <p>
                    Thank you for your application.
                    We have received your submission successfully.
                    Our HR team will review it and get back to you soon.
                </p>

                <br>

                <p><strong>Your Message:</strong></p>

                <p>{$request->message}</p>

                <br>

                <p>Regards,<br>VPPL Team</p>
            ");
    });

        } catch (\Throwable $e) {
        
            \Log::error('Mail Error : ' . $e->getMessage());
        
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }


        return response()->json([
            'status'  => 200,
            'message' => 'Application submitted successfully'
        ]);
    }

    public function landing(Request $request, $slug)
    {
        $page = Page::where('url_slug', $slug)->first();
        if (!$page) {
            abort(404);
        }
        $services = Service::where('status', 1)->get();
        return view('frontend.landing-pages.final-landingpage', compact('services', 'page'));
    }

    // public function serviceDetail($slug)
    // {

    //     $service = Service::where('url_slug', $slug)->firstOrFail();
    //     $ser_category = $service->name;
    //     $category = null;
    //     $category = strtolower(str_replace(' ', '', $ser_category));
    //     $pages = Page::where('status', 1)->whereRaw('LOWER(REPLACE(category, " ", "")) = ?', [$category])->get();
    //     return view('frontend.landing-pages.services-details', compact('service', 'pages'));
    // }


   
    public function enquiryStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits_between:7,15',
            'message' => [
                'required',
                'min:5',
                'max:1000',
                'not_regex:/<[^>]*>/'
            ],
            'subject' => 'required|string|max:255',
            'captcha' => 'required|numeric'
        ]);
        // Check math captcha
        if ((int)$request->captcha !== session('math_captcha')) {
            return response()->json([
                'status' => false,
                'errors' => [
                    'captcha' => ['Wrong answer']
                ]
            ], 422);
        }

        // clear captcha
        session()->forget('math_captcha');
        Enquiry::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'phone'   => $validated['phone'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'type'    => $request->type,
        ]);

        storeNotification(
            'New Enquiry Received',
            'You have received a new enquiry',
            'enquiry',
            1
        );

       try {

            $to = "venkadavanprojectschennai@gmail.com";
        
            // Admin Mail
            Mail::send([], [], function ($message) use ($validated, $request, $to) {
        
                $message->to($to)
                    ->from('venkadavanprojectschennai@gmail.com', 'VPPL')
                    ->replyTo('venkadavanprojectschennai@gmail.com', 'VPPL')
                    ->subject('New Enquiry Received - ' . $validated['name'])
        
                    ->html("
                        <h2>New Enquiry Received</h2>
        
                        <table cellpadding='6' cellspacing='0' border='0' width='100%'>
        
                            <tr>
                                <td><strong>Name:</strong></td>
                                <td>{$validated['name']}</td>
                            </tr>
        
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td>{$validated['email']}</td>
                            </tr>
        
                            <tr>
                                <td><strong>Phone:</strong></td>
                                <td>{$validated['phone']}</td>
                            </tr>
        
                            <tr>
                                <td><strong>Type:</strong></td>
                                <td>{$request->type}</td>
                            </tr>
        
                            <tr>
                                <td><strong>Message:</strong></td>
                                <td>{$validated['message']}</td>
                            </tr>
        
                        </table>
                    ");
            });
        
        
            // User Mail
            Mail::send([], [], function ($message) use ($validated) {
        
                $message->to($validated['email'])
                    ->from('venkadavanprojectschennai@gmail.com', 'VPPL')
                    ->replyTo('venkadavanprojectschennai@gmail.com', 'VPPL')
                    ->subject('Thank You For Contacting VPPL')
        
                    ->html("
                        <h2>Thank You for Your Enquiry</h2>
        
                        <p>Hi {$validated['name']},</p>
        
                        <p>
                            Thank you for contacting VPPL.
                            We have received your enquiry successfully.
                            Our team will get back to you shortly.
                        </p>
        
                        <br>
        
                        <p><strong>Your Message:</strong></p>
        
                        <p>{$validated['message']}</p>
        
                        <br>
        
                        <p>Regards,<br>VPPL Team</p>
                    ");
            });
        
        } catch (\Throwable $e) {
        
            \Log::error('Mail Error : ' . $e->getMessage());
        
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Your enquiry has been submitted successfully!'
        ]);
    }

     public function enquiryStoreland(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits_between:7,15',
            'email' => 'required|email|max:255',
            'service' => 'required|string|max:255',
            'captcha' => 'required|numeric'
        ]);
        // Check math captcha
        if ((int)$request->captcha !== session('math_captcha')) {
            return response()->json([
                'status' => false,
                'errors' => [
                    'captcha' => ['Wrong answer']
                ]
            ], 422);
        }

        // clear captcha
        session()->forget('math_captcha');
        Enquiry::create([
            'name'    => $validated['name'],
            'phone'   => $validated['phone'],
            'email'   => $validated['email'],
            'subject' => $validated['service'],
            'type'    => $request->type,
        ]);

        storeNotification(
            'New Enquiry Received',
            'You have received a new enquiry',
            'enquiry',
            1
        );

        try {

        $to = "venkadavanprojectschennai@gmail.com";
    
        // Admin Mail
        Mail::send([], [], function ($message) use ($validated, $request, $to) {

        $message->to($to)
            ->from('venkadavanprojectschennai@gmail.com', 'VPPL')
            ->replyTo('venkadavanprojectschennai@vppl.net', 'VPPL')
            ->subject('New Enquiry Received - ' . $validated['name'])

            ->html("
                <h2>New Enquiry Received</h2>

                <table cellpadding='6' cellspacing='0' border='0' width='100%'>

                    <tr>
                        <td><strong>Name:</strong></td>
                        <td>{$validated['name']}</td>
                    </tr>

                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>{$validated['email']}</td>
                    </tr>

                    <tr>
                        <td><strong>Phone:</strong></td>
                        <td>{$validated['phone']}</td>
                    </tr>

                    <tr>
                        <td><strong>Service:</strong></td>
                        <td>{$validated['service']}</td>
                    </tr>

                    <tr>
                        <td><strong>Type:</strong></td>
                        <td>{$request->type}</td>
                    </tr>

                </table>
            ");
    });


    // User Mail
        Mail::send([], [], function ($message) use ($validated) {
    
            $message->to($validated['email'])
                ->from('venkadavanprojectschennai@gmail.com', 'VPPL')
                ->replyTo('venkadavanprojectschennai@gmail.com', 'VPPL')
                ->subject('Thank You for Your Enquiry')
    
                ->html("
                    <p>Hi {$validated['name']},</p>
    
                    <p>
                        Thank you for contacting us.
                        We have received your enquiry and
                        our team will get back to you soon.
                    </p>
    
                    <br>
    
                    <p><strong>Selected Service:</strong></p>
    
                    <p>{$validated['service']}</p>
    
                    <br>
    
                    <p>Regards,<br>VPPL Team</p>
                ");
        });
    
        }
        
        catch (\Throwable $e) {
            Log::error('Mail Error: ' . $e->getMessage());
        }

        return response()->json([
            'status' => true,
            'message' => 'Your enquiry has been submitted successfully!'
        ]);
    }
}
