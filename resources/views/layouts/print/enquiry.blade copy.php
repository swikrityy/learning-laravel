<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <title>{{ $title ?? 'PDF' }}</title>

    {{-- <style>
        /* CSS Reset / Preflight */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            /* Replace with your preferred font */
            line-height: 1.6;
            color: #333;
            background-color: #fff;
            /* Optional background color */
        }

        /* Utility Classes */
        .mb-8 {
            margin-bottom: 2rem;
            /* 32px */
        }

        .space-y-2>*+* {
            margin-top: 0.5rem;
            /* 8px */
        }

        /* Font Size Utility Classes */
        .text-xs {
            font-size: 0.75rem;
            /* 12px */
        }

        .text-sm {
            font-size: 0.875rem;
            /* 14px */
        }

        .text-base {
            font-size: 1rem;
            /* 16px */
        }

        .text-lg {
            font-size: 1.125rem;
            /* 18px */
        }

        .text-xl {
            font-size: 1.25rem;
            /* 20px */
        }

        .text-2xl {
            font-size: 1.5rem;
            /* 24px */
        }

        .text-3xl {
            font-size: 1.875rem;
            /* 30px */
        }

        .text-4xl {
            font-size: 2.25rem;
            /* 36px */
        }

        .text-5xl {
            font-size: 3rem;
            /* 48px */
        }

        .font-bold {
            font-weight: 700;
            /* Bold */
        }

        .font-semibold {
            font-weight: 600;
            /* Semi-bold */
        }

        .text-center {
            text-align: center;
        }

        .underline {
            text-decoration: underline;
        }

        .border {
            border-width: 1px;
            border-style: solid;
            border-color: #d1d5db;
            /* Gray color */
        }

        .p-4 {
            padding: 1rem;
            /* 16px */
        }

        .p-8 {
            padding: 2rem;
            /* 16px */
        }

        .rounded-lg {
            border-radius: 0.5rem;
            /* 8px */
        }

        .overflow-x-auto {
            overflow-x: auto;
        }

        .text-lg {
            font-size: 1.125rem;
            /* 18px */
            line-height: 1.75rem;
            /* 28px */
        }

        .font-semibold {
            font-weight: 600;
        }

        .mb-4 {
            margin-bottom: 1rem;
            /* 16px */
        }

        .underline {
            text-decoration: underline;
        }

        .w-full {
            width: 100%;
        }

        .border-collapse {
            border-collapse: collapse;
        }

        .bg-gray-100 {
            background-color: #f3f4f6;
            /* Lighter gray */
        }

        .border>th,
        .border>td {
            border: 1px solid #d1d5db;
            /* Gray color */
            padding: 0.5rem 1rem;
            /* 8px 16px */
        }

        .px-4 {
            padding-left: 1rem;
            /* 16px */
            padding-right: 1rem;
            /* 16px */
        }

        .py-2 {
            padding-top: 0.5rem;
            /* 8px */
            padding-bottom: 0.5rem;
            /* 8px */
        }

        /* Table Specific Styles */
        th {
            background-color: #f3f4f6;
            /* Light gray for header */
            font-weight: bold;
        }

        td {
            background-color: #fff;
            /* White for data cells */
        }

        tr:nth-child(even) td {
            background-color: #f9fafb;
            /* Light gray for even rows */
        }

        tr:hover td {
            background-color: #e2e8f0;
            /* Darker gray on hover */
        }
    </style> --}}

    <style>
        /* Preflight Reset */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            border: 0;
            font: inherit;
            vertical-align: baseline;
        }

        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            /* Prevent font scaling in landscape */
            tab-size: 4;
            /* Set tab size */
        }

        body {
            margin: 0;
            font-family: system-ui, sans-serif;
            line-height: inherit;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        figure,
        ol,
        ul {
            margin: 0;
            padding: 0;
        }

        ol,
        ul {
            list-style: none;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            font: inherit;
            margin: 0;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        /* Custom styles from your Tailwind setup */
        .p-4 {
            padding: 1rem;
        }

        .p-8 {
            padding: 2rem;
        }

        .mb-5 {
            margin-bottom: 1.25rem;
        }

        .text-2xl {
            font-size: 1.5rem;
        }

        .font-bold {
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .text-lg {
            font-size: 1.125rem;
        }

        .font-semibold {
            font-weight: 600;
        }

        .underline {
            text-decoration: underline;
        }

        .mb-8 {
            margin-bottom: 2rem;
        }

        .space-y-2>*+* {
            margin-top: 0.5rem;
        }

        .border {
            border-width: 1px;
            border-style: solid;
            border-color: #d1d5db;
            /* Equivalent to Tailwind's default gray-300 */
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .pl-5 {
            padding-left: 1.25rem;
        }

        .capitalize {
            text-transform: capitalize;
        }

        .list-disc {
            list-style-type: disc;
        }

        .flex {
            display: flex;
        }

        .mr-2 {
            margin-right: 0.5rem;
        }

        .overflow-x-auto {
            overflow-x: auto;
        }

        .w-full {
            width: 100%;
        }

        .border-collapse {
            border-collapse: collapse;
        }

        .bg-gray-100 {
            background-color: #f3f4f6;
            /* Equivalent to Tailwind's gray-100 */
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
            /* 16px */
        }

        .flex {
            display: flex;
        }
    </style>

</head>

<body>

    @yield('content')

</body>

</html>
