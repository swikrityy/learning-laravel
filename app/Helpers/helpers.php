<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (! function_exists('updatesettingmedia')) {
    function updatesettingmedia($request, $name, $foldername)
    {
        if ($image = $request->file($name)) {
            $bucket = "umi-advisor"; // static bucket name
            $baseUrl = "https://s3-np1.datahub.com.np"; // static base URL
            $imageName = time() . '-' . rand(0, 99) . '-' . $image->getClientOriginalName();
            // Upload to S3
            $path = $image->storeAs(
                $foldername,        // folder (e.g., 'setting')
                $imageName,         // file name
                ['disk' => 's3', 'visibility' => 'public']
            );
            // Build full URL manually (same as in fileUpload)
            $fullUrl = rtrim($baseUrl, '/') . '/' . trim($bucket, '/') . '/' . ltrim($path, '/');
            return $fullUrl;
        }

        return null;
    }
}
if (! function_exists('deletesettingmedia')) {
    function deletesettingmedia($image, $old_image, $image_name, $siteSetting, $siteSettings)
    {
        if ($image) {
            removeFile($old_image);  // delete old image from S3
            $siteSetting[$image_name] = $image;
        } else {
            $siteSetting[$image_name] = $siteSettings[$image_name];
        }

        return $siteSetting[$image_name];
    }
}
if (! function_exists('make_slug')) {
    function make_slug($string)
    {
        return Str::slug($string);
    }
}
if (! function_exists('generateUniqueSlug')) {
    // Function to generate a unique slug
    function generateUniqueSlug($slug, $title, $model)
    {
        $originalSlug = make_slug($slug ?? $title);
        $uniqueSlug = $originalSlug;
        $counter = 1;

        // Keep checking if the slug exists in the database
        while ($model::where('slug', $uniqueSlug)->exists()) {
            // Append a number to the slug to make it unique
            $uniqueSlug = $originalSlug . '-' . $counter;
            $counter++;
        }
        return $uniqueSlug;
    }
}
if (! function_exists('fileUpload')) {
    function fileUpload($request, $name, $folder)
    {
        try {
            if ($request->hasFile($name)) {
                $bucket = "umi-advisor"; // static bucket name
                $baseUrl = "https://s3-np1.datahub.com.np";

                // Determine folder path
                $folderPath = $folder ? trim($folder, '/') : ''; // if folder is passed, use it; else root

                // store file in S3
                $path = $request->file($name)->storePublicly($folderPath, 's3');

                // build full URL
                $fullUrl = rtrim($baseUrl, '/') . '/' . trim($bucket, '/') . '/' . ltrim($path, '/');
                return $fullUrl;
            }

            return null;
        } catch (\Exception $e) {
            return null;
        }
    }
}
if (! function_exists('galleryfileUpload')) {
    function galleryfileUpload($request, $name, $foldername)
    {
        try {
            if ($request->hasFile($name)) {
                $bucket = "umi-advisor"; // same static bucket name
                $baseUrl = "https://s3-np1.datahub.com.np";

                // custom image name
                $image = $request->file($name);
                $imageName = time() . '-' . rand(0, 99) . '-' . $image->getClientOriginalName();

                // upload to S3 (with folder and filename)
                $path = $image->storeAs(
                    trim($foldername, '/'),  // S3 folder
                    $imageName,              // custom file name
                    's3'                     // storage disk
                );

                // build full public URL manually
                $fullUrl = rtrim($baseUrl, '/') . '/' . trim($bucket, '/') . '/' . ltrim($path, '/');
                return $fullUrl;
            }

            return null;
        } catch (\Exception $e) {
            return null;
        }
    }
}
if (! function_exists('removeFile')) {
    function removeFile($fileUrl)
    {
        try {
            $bucket = "umi-advisor"; // same static bucket name
            $baseUrl = "https://s3-np1.datahub.com.np";

            // Remove base URL + bucket from the full file URL to get the relative path
            $prefix = rtrim($baseUrl, '/') . '/' . trim($bucket, '/');
            $path = str_replace($prefix . '/', '', $fileUrl);

            // Delete if exists
            if (Storage::disk('s3')->exists($path)) {
                Storage::disk('s3')->delete($path);
                return true;
            }

            return false;
        } catch (\Exception $e) {
            return false;
        }
    }
}
if (! function_exists('stripLetters')) {
    function stripLetters($text, $number, $last = '')
    {
        if (! empty($text)) {
            return substr(strip_tags(html_entity_decode($text)), 0, $number) . $last;
        }
    }
}
if (! function_exists('formatBlogDate')) {

    function formatBlogDate($dateString)
    {
        $date = Carbon::parse($dateString);
        $formattedDate = $date->format('F d Y');

        return $formattedDate;
    }

}
if (!function_exists('getGlobalData')) {
    function getGlobalData()
    {
        return [
            'settings' => \App\Models\Settings::pluck('value', 'key'),
            'socials' => \App\Models\Social::where('status', 1)->orderBy('order')->get() ?? [],
            'footer_countries' => \App\Models\Country::where('status', 1)->orderBy('order')->get() ?? [],
            'footer_countries_1' => \App\Models\Country::where('status', 1)->orderBy('order')->limit(5)->get() ?? [],
            'footer_course' => \App\Models\Course::where('status', 1)->orderBy('order')->limit(5)->get() ?? [],
            'footer_services' => \App\Models\Service::where('status', 1)->orderBy('order')->limit(5)->get() ?? [],
            'recent_post' => \App\Models\Blog::where('status', 1)->limit(2)->get()??[],

        ];
    }
}

