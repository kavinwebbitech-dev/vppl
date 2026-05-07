<?php

use App\Models\Notification;
use App\Models\Setting;
use App\Models\UniqueVisitor;

// if (!function_exists('increaseWebsiteVisits')) {
//     function increaseWebsiteVisits($ip)
//     {
//         $visitor = UniqueVisitor::firstOrCreate(['ip' => $ip]);

//         if ($visitor->wasRecentlyCreated) {
//             $setting = Setting::firstOrCreate(
//                 ['key' => 'website_visits'],
//                 ['value' => 0]
//             );

//             $setting->increment('value');
//         }
//     }
// }

if (!function_exists('storeNotification')) {

    /**
     * Store notification dynamically
     *
     * @param string $title
     * @param string $message
     * @param string $type  (enquiry|service|blog|landing|custom)
     * @param int|null $userId
     * @param array|null $data
     * @param string|null $customUrl
     */
    function storeNotification(
        string $title,
        string $message,   
        string $type,
        ?int $userId = null,
        ?array $data = null,
        ?string $customUrl = null
    ) {
        $typeUrls = [
            'enquiry' => route('enquiry.index'),
            'service' => route('service.index'),
            'landing' => route('pages.index'),
            'sitemap' => route('sitemap.sitemap-robots.index'),
            'robot'   => route('sitemap.sitemap-robots.index'),
            'jobs'    => route('jobs.index'),
        ];

        Notification::create([
            'user_id' => $userId,
            'title'   => $title,
            'message' => $message,
            'type'    => $type,
            'data'    => $data ? json_encode($data) : null,
            'url'     => $customUrl ?? ($typeUrls[$type] ?? null),
        ]);
    }
}