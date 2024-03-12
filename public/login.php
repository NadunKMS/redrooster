<?php include_once('header.php'); ?>
  <body class="dark:bg-slate-900 font-redhat bg-gradient-to-b from-orange-100 via-amber-50 to-orange-100 flex items-center h-screen py-16">
    <main class="w-full max-w-md p-6 mx-auto">
      <div class="mt-7 rounded-xl dark:bg-gray-800 dark:border-gray-700 bg-white border border-gray-200 shadow-sm">
        <div class="sm:p-7 p-4">
          <div class="text-center">
            <h1 class="dark:text-white block text-2xl font-bold text-gray-800">Sign in</h1>
            <p class="dark:text-gray-400 mt-2 text-sm text-gray-600">
              Don't have an account yet?
              <a class="decoration-2 hover:underline dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 text-primary font-medium" href="signup.php">
                Sign up here
              </a>
            </p>
          </div>
            <!-- Form -->
            <form action="includes/login.inc.php" method="post">
              <div class="gap-y-4 grid mt-8">
                <!-- Form Group -->
                <div>
                  <label for="email" class="dark:text-white block mb-2 text-sm">Email address</label>
                  <div class="relative">
                    <input type="email" id="email" name="email" class="focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600 block w-full px-4 py-3 text-sm border-gray-200 rounded-lg" required placeholder="name@email.com" aria-describedby="email-error">
                    <div class="end-0 pe-3 absolute inset-y-0 flex items-center hidden pointer-events-none">
                      <svg class="w-5 h-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                      </svg>
                    </div>
                  </div>
                  <p class="hidden mt-2 text-xs text-red-600" id="email-error">Please include a valid email address so we can get back to you</p>
                </div>
                <!-- End Form Group -->

                <!-- Form Group -->
                <div>
                  <div class="flex items-center justify-between">
                    <label for="password" class="dark:text-white block mb-2 text-sm">Password</label>
                    <a class="text-primary decoration-2 hover:underline dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 text-sm font-medium" href="#">Forgot password?</a>
                  </div>
                  <div class="relative">
                    <input type="password" id="password" name="password" class="focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600 block w-full px-4 py-3 text-sm border-gray-200 rounded-lg" required aria-describedby="password-error">
                    <div class="end-0 pe-3 absolute inset-y-0 flex items-center hidden pointer-events-none">
                      <svg class="w-5 h-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                      </svg>
                    </div>
                  </div>
                  <p class="hidden mt-2 text-xs text-red-600" id="password-error">8+ characters required</p>
                </div>
                <!-- End Form Group -->

                <!-- Checkbox -->
                <div class="flex items-center">
                  <div class="flex">
                    <input id="remember-me" name="remember-me" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-primary pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                  </div>
                  <div class="ms-3">
                    <label for="remember-me" class="dark:text-white text-sm">Remember me</label>
                  </div>
                </div>
                <!-- End Checkbox -->

                <button type="submit" name="submit" class="gap-x-2 bg-primary hover:bg-primary_hover disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-white border border-transparent rounded-lg">Sign in</button>
              </div>
            </form>
            <!-- End Form -->
          </div>
        </div>
      </div>
    </main>
    <script>
          // Check if the 'alert' parameter with the value 'notlogged' is present in the URL
    const urlParams = new URLSearchParams(window.location.search);
    const alertParam = urlParams.get('alert');

    if (alertParam === 'notlogged') {
        // Display a creative alert message
        alert("Uh-oh! It seems you forgot to log in before shopping.\nPlease login to unlock the wonders of Redrooster store!");
    }
    else if (alertParam === 'emailnull') {
        // Display a creative alert message
        alert("Uh-oh! It seems you haven't registered on Redrooster\nClick Sign up here button to creat an account!");
    }
    else if (alertParam === 'invalidpw') {
        // Display a creative alert message
        alert("Uh-oh! Double check your password!");
    }
    const newUrl = window.location.href.split('?')[0];
    history.replaceState(null, document.title, newUrl);
    </script>
  </body>
</html>