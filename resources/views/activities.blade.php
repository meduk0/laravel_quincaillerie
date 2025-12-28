<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body class="flex flex-col min-h-screen bg-indigo-300">
  <div class="navbar bg-gray-700 gap-10 justify-center shadow-sm p-3">
    <a  href="/start-view" target="_blank" class="btn btn-ghost text-xl">start</a>
    <a href="{{ route('start') }}" class="btn btn-ghost text-xl">daisyUI</a>
    <a href="{{ url('/aymen') }}" target="_blank" class="btn btn-ghost text-xl">saymyname</a>
  </div>

  <main class="flex flex-col flex-grow items-center">
    @if ( isset($name) )
      @if ( isset($age) )
            <h1 class="text-gray-700 mr-auto ml-auto text-4xl p-3">Hello, {{ $name }}! I am {{ $age }}.</h1>
      @else
      <h1 class="text-gray-700 mr-auto ml-auto text-4xl p-3">Hello, {{ $name }}! Welcome to the Activities Page.</h1>
      @endif
    @endif
 <div>
 <div class="grid sm:grid-cols-4 gap-4 mb-4">
  <div class="m-2 outline-2 outline-offset-4 outline-base-content/5 bg-white rounded-box py-12 px-4 flex flex-col gap-6 items-center">
    <img class="size-32" src="https://img.daisyui.com/images/daisyui/mark-static.svg" alt="daisyUI Logo" />
    <div class="flex gap-2 sm:gap-4 text-[0.6875rem] opacity-70 text-black">
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-black" href="https://img.daisyui.com/images/daisyui/mark-static.svg">SVG</a>
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-black" href="https://img.daisyui.com/images/daisyui/mark-compressed.svg">Minified SVG</a>
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-black" href="https://img.daisyui.com/images/daisyui/daisyui-logo-2000.png">PNG</a>
    </div>
  </div>
  <div class="m-2 outline-2 outline-offset-4 outline-base-content/5 bg-black rounded-box py-12 px-4 flex flex-col gap-6 items-center">
    <img class="size-32" src="https://img.daisyui.com/images/daisyui/mark-static.svg" alt="daisyUI Logo" />
    <div class="flex gap-2 sm:gap-4 text-[0.6875rem] opacity-70 text-white">
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-white" href="https://img.daisyui.com/images/daisyui/mark-static.svg">SVG</a>
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-white" href="https://img.daisyui.com/images/daisyui/mark-compressed.svg">Minified SVG</a>
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-white" href="https://img.daisyui.com/images/daisyui/daisyui-logo-2000.png">PNG</a>
    </div>
  </div>
</div>

<div class="grid sm:grid-cols-2 gap-4 mb-4">
  <div class="m-2 outline-2 outline-offset-4 outline-base-content/5 bg-white rounded-box py-12 px-4 flex flex-col gap-6 items-center">
    <img class="w-64" src="https://img.daisyui.com/images/daisyui/type-dark.svg" alt="daisyUI Logo" />
    <div class="flex gap-2 sm:gap-4 text-[0.6875rem] opacity-70 text-black">
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-black" href="https://img.daisyui.com/images/daisyui/type-dark.svg">SVG</a>
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-black" href="https://img.daisyui.com/images/daisyui/type-dark-compressed.svg">Minified SVG</a>
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-black" href="https://img.daisyui.com/images/daisyui/type-dark.png">PNG</a>
    </div>
  </div>
  <div class="m-2 outline-2 outline-offset-4 outline-base-content/5 bg-black rounded-box py-12 px-4 flex flex-col gap-6 items-center">
    <img class="w-64" src="https://img.daisyui.com/images/daisyui/type-light.svg" alt="daisyUI Logo" />
    <div class="flex gap-2 sm:gap-4 text-[0.6875rem] opacity-70 text-white">
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-white" href="https://img.daisyui.com/images/daisyui/type-light.svg">SVG</a>
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-white" href="https://img.daisyui.com/images/daisyui/type-light-compressed.svg">Minified SVG</a>
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-white" href="https://img.daisyui.com/images/daisyui/type-light.png">PNG</a>
    </div>
  </div>
</div>

<div class="grid sm:grid-cols-2 gap-4 mb-4">
  <div class="m-2 outline-2 outline-offset-4 outline-base-content/5 bg-white rounded-box py-12 px-4 flex flex-col gap-6 items-center">
    <img class="w-64" src="https://img.daisyui.com/images/daisyui/horizontal-dark.svg" alt="daisyUI Logo" />
    <div class="flex gap-2 sm:gap-4 text-[0.6875rem] opacity-70 text-black">
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-black" href="https://img.daisyui.com/images/daisyui/horizontal-dark.svg">SVG</a>
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-black" href="https://img.daisyui.com/images/daisyui/horizontal-dark-compressed.svg">Minified SVG</a>
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-black" href="https://img.daisyui.com/images/daisyui/horizontal-dark.png">PNG</a>
    </div>
  </div>
  <div class="m-2 outline-2 outline-offset-4 outline-base-content/5 bg-black rounded-box py-12 px-4 flex flex-col gap-6 items-center">
    <img class="w-64" src="https://img.daisyui.com/images/daisyui/horizontal-light.svg" alt="daisyUI Logo" />
    <div class="flex gap-2 sm:gap-4 text-[0.6875rem] opacity-70 text-white">
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-white" href="https://img.daisyui.com/images/daisyui/horizontal-light.svg">SVG</a>
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-white" href="https://img.daisyui.com/images/daisyui/horizontal-light-compressed.svg">Minified SVG</a>
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-white" href="https://img.daisyui.com/images/daisyui/horizontal-light.png">PNG</a>
    </div>
  </div>
</div>

<div class="grid sm:grid-cols-2 gap-4 mb-4">
  <div class="m-2 outline-2 outline-offset-4 outline-base-content/5 bg-white rounded-box py-12 px-4 flex flex-col gap-6 items-center">
    <img class="size-32" src="https://img.daisyui.com/images/daisyui/mark-rotating.svg" alt="daisyUI Logo" />
    <div class="flex gap-2 sm:gap-4 text-[0.6875rem] opacity-70 text-black">
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-black" href="https://img.daisyui.com/images/daisyui/mark-rotating.svg">SVG</a>
    </div>
  </div>
  <div class="m-2 outline-2 outline-offset-4 outline-base-content/5 bg-black rounded-box py-12 px-4 flex flex-col gap-6 items-center">
    <img class="size-32" src="https://img.daisyui.com/images/daisyui/mark-rotating.svg" alt="daisyUI Logo" />
    <div class="flex gap-2 sm:gap-4 text-[0.6875rem] opacity-70 text-white">
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-white" href="https://img.daisyui.com/images/daisyui/mark-rotating.svg">SVG</a>
    </div>
  </div>
</div>

<div class="grid sm:grid-cols-2 gap-4 mb-4">
  <div class="m-2 outline-2 outline-offset-4 outline-base-content/5 bg-white rounded-box py-12 px-4 flex flex-col gap-6 items-center">
    <img class="w-64" src="https://img.daisyui.com/images/daisyui/horizontal-mono-dark.png" alt="daisyUI Logo" />
    <div class="flex gap-2 sm:gap-4 text-[0.6875rem] opacity-70 text-black">
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-black" href="https://img.daisyui.com/images/daisyui/horizontal-mono-dark.svg">SVG</a>
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-black" href="https://img.daisyui.com/images/daisyui/horizontal-mono-dark.png">PNG</a>
    </div>
  </div>
  <div class="m-2 outline-2 outline-offset-4 outline-base-content/5 bg-black rounded-box py-12 px-4 flex flex-col gap-6 items-center">
    <img class="w-64" src="https://img.daisyui.com/images/daisyui/horizontal-mono-light.png" alt="daisyUI Logo" />
    <div class="flex gap-2 sm:gap-4 text-[0.6875rem] opacity-70 text-white">
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-white" href="https://img.daisyui.com/images/daisyui/horizontal-mono-light.svg">SVG</a>
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-white" href="https://img.daisyui.com/images/daisyui/horizontal-mono-light.png">PNG</a>
    </div>
  </div>
</div>

<div class="grid sm:grid-cols-2 gap-4 mb-4">
  <div class="m-2 outline-2 outline-offset-4 outline-base-content/5 bg-white rounded-box py-12 px-4 flex flex-col gap-6 items-center">
    <img class="size-32" src="https://img.daisyui.com/images/daisyui/mark-mono-dark.svg" alt="daisyUI Logo" />
    <div class="flex gap-2 sm:gap-4 text-[0.6875rem] opacity-70 text-black">
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-black" href="https://img.daisyui.com/images/daisyui/mark-mono-dark.svg">SVG</a>
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-black" href="https://img.daisyui.com/images/daisyui/mark-mono-dark.png">PNG</a>
    </div>
  </div>
  <div class="m-2 outline-2 outline-offset-4 outline-base-content/5 bg-black rounded-box py-12 px-4 flex flex-col gap-6 items-center">
    <img class="size-32" src="https://img.daisyui.com/images/daisyui/mark-mono-light.svg" alt="daisyUI Logo" />
    <div class="flex gap-2 sm:gap-4 text-[0.6875rem] opacity-70 text-white">
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-white" href="https://img.daisyui.com/images/daisyui/mark-mono-light.svg">SVG</a>
      <a target="_blank" rel="noopener, noreferrer" class="no-underline hover:underline text-white" href="https://img.daisyui.com/images/daisyui/mark-mono-light.png">PNG</a>
    </div>
  </div>
</div></div>
  </main>
  
  <footer class="footer footer-horizontal footer-center bg-blue-400 text-primary-content p-4">
  <aside>
    <svg
      width="50"
      height="50"
      viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg"
      fill-rule="evenodd"
      clip-rule="evenodd"
      class="inline-block fill-current">
      <path
        d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"></path>
    </svg>
    <p class="font-bold">
      daisyUI 5
      <br />
      The most popular, free and open-source component library for Tailwind CSS
    </p>
    <p>Copyright © {{ now()->year }} - All right reserved</p>
  </aside>
  <nav>
    <div class="grid grid-flow-col gap-4">
      <a>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          class="fill-current">
          <path
            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
        </svg>
      </a>
      <a>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          class="fill-current">
          <path
            d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
        </svg>
      </a>
      <a>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          class="fill-current">
          <path
            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>
        </svg>
      </a>
    </div>
  </nav>
</footer>
    <!--<button class="ml-auto mr-auto mt-2 block btn btn-primary">Save</button>
    <div class="dock">
  <button>
    <a href="/start-view">
        <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt"><polyline points="1 11 12 2 23 11" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2"></polyline><path d="m5,13v7c0,1.105.895,2,2,2h10c1.105,0,2-.895,2-2v-7" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path><line x1="12" y1="22" x2="12" y2="18" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></line></g></svg>
        <span class="dock-label">Start-View</span>
    </a>
  </button>
  
  <button class="dock-active">
    <a href="{{ route("start") }}"><svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt"><polyline points="3 14 9 14 9 17 15 17 15 14 21 14" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2"></polyline><rect x="3" y="3" width="18" height="18" rx="2" ry="2" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></rect></g></svg>
    <span class="dock-label">Start</span></a>
  </button>
  
  <button>
    <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt"><circle cx="12" cy="12" r="3" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></circle><path d="m22,13.25v-2.5l-2.318-.966c-.167-.581-.395-1.135-.682-1.654l.954-2.318-1.768-1.768-2.318.954c-.518-.287-1.073-.515-1.654-.682l-.966-2.318h-2.5l-.966,2.318c-.581.167-1.135.395-1.654.682l-2.318-.954-1.768,1.768.954,2.318c-.287.518-.515,1.073-.682,1.654l-2.318.966v2.5l2.318.966c.167.581.395,1.135.682,1.654l-.954,2.318,1.768,1.768,2.318-.954c.518.287,1.073.515,1.654.682l.966,2.318h2.5l.966-2.318c.581-.167,1.135-.395,1.654-.682l2.318.954,1.768-1.768-.954-2.318c.287-.518.515-1.073.682-1.654l2.318-.966Z" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path></g></svg>
    <span class="dock-label">Settings</span>
  </button>
</div>
         <div class="fab">
        a focusable div with tabindex is necessary to work on all browsers. role="button" is necessary for accessibility -
        <div tabindex="0" role="button" class="btn btn-lg btn-circle btn-primary">F</div>

        <-- buttons that show up when FAB is open 
        <button class="btn btn-lg btn-circle">
            <a href="/start-view">start-view</a>
        </button>
        <button class="btn btn-lg btn-circle">
            <a href="{{ route("start") }}">start</a>
        </button>
        <button class="btn btn-lg btn-circle">
            <a href="/start-view"></a>
        </button>
    </div>-->
</body>
</html>