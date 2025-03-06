<header class="position-fixed w-100 z-3 ">
    <div class="d-md-none shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top w-100">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand align-center pt-4 d-md-none">Daro Time
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-capsule-pill" viewBox="0 0 16 16">
                        <path
                            d="M11.02 5.364a3 3 0 0 0-4.242-4.243L1.121 6.778a3 3 0 1 0 4.243 4.243l5.657-5.657Zm-6.413-.657 2.878-2.879a2 2 0 1 1 2.829 2.829L7.435 7.536zM12 8a4 4 0 1 1 0 8 4 4 0 0 1 0-8m-.5 1.042a3 3 0 0 0 0 5.917zm1 5.917a3 3 0 0 0 0-5.917z" />
                    </svg>
                </h1>
                <a href="/sighup" class="btn btn-outline-primary pt-2 pb-2">ورود/ثبت نام
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                </a>
            </div>
        </nav>
        <div class="offcanvas offcanvas-start shadow" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">منو</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <hr>
            <div class="offcanvas-body ">
                <ul class="navbar-nav mb-3 justify-content-start flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" id="h1" href="/">خانه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="d1" href="/dashboard">داشبورد</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="a1" href="/about">درباره ما</a>
                    </li>
                </ul>
                <div class="d-grid gap-2 d-md-block">
                    <button id="themeToggleDark1" class="btn btn-dark">تبدیل به تم تاریک <svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-moon-stars" viewBox="0 0 16 16">
                            <path
                                d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278M4.858 1.311A7.27 7.27 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.32 7.32 0 0 0 5.205-2.162q-.506.063-1.029.063c-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286" />
                            <path
                                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.73 1.73 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.73 1.73 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.73 1.73 0 0 0 1.097-1.097zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z" />
                        </svg></button>
                    <button id="themeToggleLight1" class="btn btn-light" style="display: none;">تبدیل به تم روشن <svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sun" viewBox="0 0 16 16">
                            <path
                                d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
                        </svg></button>
                    <a href="/singup" class="btn btn-outline-primary m-4 pt-2 pb-2">ورود/ثبت نام
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="d-none d-md-block shadow p-3 mb-5 bg-body-tertiary rounded">
        <nav class="navbar navbar-expand-lg bg-body-tertiary w-100">
            <div class="container-fluid">
                <h1 class="navbar-brand me-5 ms-2">Daro Time
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-capsule-pill" viewBox="0 0 16 16">
                        <path
                            d="M11.02 5.364a3 3 0 0 0-4.242-4.243L1.121 6.778a3 3 0 1 0 4.243 4.243l5.657-5.657Zm-6.413-.657 2.878-2.879a2 2 0 1 1 2.829 2.829L7.435 7.536zM12 8a4 4 0 1 1 0 8 4 4 0 0 1 0-8m-.5 1.042a3 3 0 0 0 0 5.917zm1 5.917a3 3 0 0 0 0-5.917z" />
                    </svg>
                </h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link me-2" id="h10" href="/">خانه</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link" id="d10" href="/dashboard">داشبورد</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link" id="a10" href="/about">درباره ما</a>
                        </li>
                    </ul>
                    <button id="themeToggleDark" class="btn btn-dark">تبدیل به تم تاریک <svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-moon-stars" viewBox="0 0 16 16">
                            <path
                                d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278M4.858 1.311A7.27 7.27 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.32 7.32 0 0 0 5.205-2.162q-.506.063-1.029.063c-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286" />
                            <path
                                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.73 1.73 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.73 1.73 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.73 1.73 0 0 0 1.097-1.097zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z" />
                        </svg></button>
                    <button id="themeToggleLight" class="btn btn-light" style="display: none;">تبدیل به تم روشن <svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sun" viewBox="0 0 16 16">
                            <path
                                d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
                        </svg></button>
                    <a href="/singup" class="btn btn-outline-primary ms-5">ورود/ثبت نام
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        function addClassById(elementId, className) {
            const element = document.getElementById(elementId);
            if (element) {
                element.classList.add(className);
                element.style.fontWeight = 'bold'; // Set font weight to bold
            }
        }

        // Get the base URL from Laravel's environment
        const baseURL = "{{ env('URL') }}";
        const routes = [{
                url: baseURL,
                id: "h1"
            },
            {
                url: baseURL + "/dashboard",
                id: "d1"
            },
            {
                url: baseURL + "/about",
                id: "a1"
            },
            {
                url: baseURL,
                id: "h10"
            },
            {
                url: baseURL + "/dashboard",
                id: "d10"
            },
            {
                url: baseURL + "/about",
                id: "a10"
            }
        ];

        // Check the current URL against defined routes
        routes.forEach(route => {
            if (window.location.href === route.url) {
                addClassById(route.id, 'active');
            }
        });
    });

    function setTheme(theme) {
        const body = document.body;
        body.setAttribute('data-bs-theme', theme);

        // Toggle button visibility for mobile and desktop separately
        if (theme === 'dark') {
            document.getElementById('themeToggleDark').style.display = 'none';
            document.getElementById('themeToggleLight').style.display = 'inline-block';
            document.getElementById('themeToggleDark1').style.display = 'none';
            document.getElementById('themeToggleLight1').style.display = 'inline-block';
        } else {
            document.getElementById('themeToggleLight').style.display = 'none';
            document.getElementById('themeToggleDark').style.display = 'inline-block';
            document.getElementById('themeToggleLight1').style.display = 'none';
            document.getElementById('themeToggleDark1').style.display = 'inline-block';
        }
    }

    // Event listeners for the Dark Theme buttons
    document.getElementById('themeToggleDark').addEventListener('click', function() {
        setTheme('dark');
    });
    document.getElementById('themeToggleDark1').addEventListener('click', function() {
        setTheme('dark');
    });

    // Event listeners for the Light Theme buttons
    document.getElementById('themeToggleLight').addEventListener('click', function() {
        setTheme('light');
    });
    document.getElementById('themeToggleLight1').addEventListener('click', function() {
        setTheme('light');
    });
</script>
