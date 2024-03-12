<?php include_once('header.php'); ?>
<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="dark:bg-slate-900 bg-gradient-to-l from-orange-100 via-amber-50 to-orange-100 font-redhat flex items-center h-full py-16">
    <main class="w-full max-w-md p-6 mx-auto">
      <div class="mt-7 rounded-xl dark:bg-gray-800 dark:border-gray-700 bg-white border border-gray-200 shadow-sm">
        <div class="sm:p-7 p-4">
          <div class="text-center">
            <h1 class="dark:text-white block text-2xl font-bold text-gray-800">Sign up</h1>
            <p class="dark:text-gray-400 mt-2 text-sm text-gray-600">
              Already have an account?
              <a class="decoration-2 hover:underline dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 text-primary font-medium" href="login.php">
                Sign in here
              </a>
            </p>
          </div>

          <div class="mt-8">

            <!-- Form -->
            <form action="includes/signup.inc.php" method="post">
              <div class="gap-y-4 grid">
                <!-- Form Group -->
                <div>
                <div>
                    <div class="sm:flex mb-2 rounded-lg">
                      <span class="min-w-fit bg-gray-50 -ms-px first:rounded-t-lg last:rounded-b-lg sm:w-auto sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg dark:bg-gray-700 dark:border-gray-700 dark:text-gray-400 inline-flex items-center w-full px-4 py-3 -mt-px text-sm text-gray-500 border border-gray-200">Name</span>
                      <input type="text" name="fname" class="pe-11 sm:shadow-sm -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600 relative block w-full px-4 py-3 -mt-px text-sm border-gray-200" placeholder="First name">
                      <input type="text" name="lname" class="pe-11 -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600 relative block w-full px-4 py-3 -mt-px text-sm border-gray-200 shadow-sm" placeholder="Last name">
                    </div>
                </div>
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
                  <label for="password" class="dark:text-white block mb-2 text-sm">Password</label>
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

                <!-- Form Group -->
                <div>
                  <label for="conpassword" class="dark:text-white block mb-2 text-sm">Confirm Password</label>
                  <div class="relative">
                    <input type="password" id="conpassword" name="conpassword" class="focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600 block w-full px-4 py-3 text-sm border-gray-200 rounded-lg" required aria-describedby="confirm-password-error">
                    <div class="end-0 pe-3 absolute inset-y-0 flex items-center hidden pointer-events-none">
                      <svg class="w-5 h-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                      </svg>
                    </div>
                  </div>
                  <p class="hidden mt-2 text-xs text-red-600" id="conpassword-error">Password does not match the password</p>
                </div>
                <!-- End Form Group -->

                <!-- Checkbox -->
                <div class="flex items-center">
                  <div class="flex">
                    <input id="remember-me" name="remember-me" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-primary pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-primarydark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                  </div>
                  <div class="ms-3">
                    <label for="remember-me" class="dark:text-white text-sm">I accept the <a class="decoration-2 hover:underline dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 text-primary font-medium" href="#">Terms and Conditions</a></label>
                  </div>
                </div>
                <!-- End Checkbox -->

                <button type="submit" name="submit" class="gap-x-2 hover:bg-primary_hover disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 bg-primary inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-white border border-transparent rounded-lg">Sign up</button>
              </div>
            </form>
            <!-- End Form -->
          </div>
        </div>
      </div>
    </main>
  </body>
</html>