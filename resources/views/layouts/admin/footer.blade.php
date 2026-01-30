<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            &copy;
            <script>
                document.write(new Date().getFullYear());
            </script>
            ,
            <a href="{{ route('admin.dashboard') }}">{{ $settings['site_title'] ?? 'Umi Advisor' }}</a>
        </div>

        <div class="mb-2 mb-md-0">
            <p>
                Powered by
                <a href="https://paradiseit.com.np/" target="_blank">Paradise It
                    Solution </a>
            </p>
        </div>

    </div>
</footer>