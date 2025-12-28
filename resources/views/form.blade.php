<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <style>
    @keyframes slideDown {
      from {
        transform: translateY(-100%);
        opacity: 0;
      }
      to {
        transform: translateY(0);
        opacity: 1;
      }
    }
    
    @keyframes slideUp {
      from {
        transform: translateY(0);
        opacity: 1;
      }
      to {
        transform: translateY(-100%);
        opacity: 0;
      }
    }
    
    .toast-notification.show {
      animation: slideDown 0.5s ease-out forwards;
    }
    
    .toast-notification.hide {
      animation: slideUp 0.5s ease-in forwards;
    }
  </style>
</head>
<body class="bg-base-200 min-h-screen flex items-center justify-center p-4">
  <div id="toastContainer" class="toast toast-top toast-center z-50 hidden toast-notification">
    <div role="alert" class="alert alert-success shadow-lg">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <span id="toastMessage">Form is valid and ready to submit!</span>
    </div>
  </div>
  <script>
        
    const toastContainer = document.getElementById('toastContainer');
    const toastMessage = document.getElementById('toastMessage');
    
    function showToast(message, type = 'success') {
      // Set message
      toastMessage.textContent = message;
      
      // Update alert type
      const alertElement = toastContainer.querySelector('.alert');
      alertElement.className = `alert alert-${type} shadow-lg`;
      
      // Show toast with slide down animation
      toastContainer.classList.remove('hidden');
      toastContainer.classList.remove('hide');
      toastContainer.classList.add('show');
      
      // Hide toast after 2 seconds with slide up animation
      setTimeout(() => {
        toastContainer.classList.remove('show');
        toastContainer.classList.add('hide');
        
        // Remove from DOM after animation completes
        setTimeout(() => {
          toastContainer.classList.add('hidden');
          toastContainer.classList.remove('hide');
        }, 500);
      }, 2000);
    }
    </script>

  @session("success")
    <script>
     showToast('{{ Session::get("success") }}', 'success');
     </script>
  @endsession
  @session("error")
    <script>
     showToast('{{ Session::get("error") }}', 'error');
     </script>
  @endsession
  <div class="card w-full max-w-2xl bg-base-100 shadow-xl">
    <div class="card-body">
      <h2 class="card-title text-2xl mb-6">Registration Form</h2>
      
      <form class="space-y-6 group" method="post" action="{{ url('/info') }}">
        @csrf
        <fieldset class="fieldset">
          <legend class="fieldset-legend">First Name</legend>
          <input 
            type="text" 
            name="firstname"
            class="input validator w-full" 
            placeholder="Enter your first name"
            required
            value="{{ old('name') }}"
            minlength="3"
            title="First name must be at least 3 characters"
          />
          <p class="validator-hint">Minimum 3 characters required</p>
        </fieldset>

        <fieldset class="fieldset">
          <legend class="fieldset-legend">Surname</legend>
          <input 
            type="text" 
            name="surname"
            class="input validator w-full" 
            placeholder="Enter your surname"
            required
            value="{{ old('sname') }}"
            minlength="3"
            title="Surname must be at least 3 characters"
          />
          <p class="validator-hint">Minimum 3 characters required</p>
        </fieldset>

        <fieldset class="fieldset">
          <legend class="fieldset-legend">Age</legend>
          <input 
            type="number" 
            name="age"
            class="input validator w-full" 
            placeholder="Enter your age"
            required
            value="{{ old('age') }}"
            min="20"
            max="60"
            title="Age must be between 20 and 60"
          />
          <p class="validator-hint">Must be between 20 and 60 years old</p>
        </fieldset>

        <fieldset class="fieldset">
          <legend class="fieldset-legend">Gender</legend>
          <div class="flex flex-col sm:flex-row gap-4">
            <label class="label cursor-pointer gap-2 flex-1 border rounded-lg p-4">
              <input 
                type="radio" 
                name="gender" 
                value="male"
                class="radio radio-primary" 
                required
                checked="{{ old("genre")=='m'?true:false }}"
              />
              <span class="label-text">Masculin</span>
            </label>
            <label class="label cursor-pointer gap-2 flex-1 border rounded-lg p-4">
              <input 
                type="radio" 
                name="gender" 
                value="female"
                class="radio radio-primary"
                required
              />
              <span class="label-text">Féminin</span>
            </label>
          </div>
        </fieldset>

        <fieldset class="fieldset bg-base-100 border-base-300 rounded-box border p-4">
          <legend class="fieldset-legend">Hobbies (Select at least one)</legend>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-2">
            <label class="label cursor-pointer gap-2">
              <input 
                type="checkbox" 
                name="selection_list[]" 
                value="reading"
                class="checkbox checkbox-primary"
                @checked(is_array(old('selection_list')) && in_array('reading', old('selection_list')))
              />
              <span class="label-text">Reading</span>
            </label>
            <label class="label cursor-pointer gap-2">
              <input 
                type="checkbox" 
                name="selection_list[]" 
                value="sports"
                @checked(is_array(old('selection_list')) && in_array('sports', old('selection_list')))
                class="checkbox checkbox-primary" 
              />
              <span class="label-text">Sports</span>
            </label>
            <label class="label cursor-pointer gap-2">
              <input 
                type="checkbox" 
                name="selection_list[]" 
                value="music"
                @checked(is_array(old('selection_list')) && in_array('music', old('selection_list')))
                class="checkbox checkbox-primary" 
              />
              <span class="label-text">Music</span>
            </label>
            <label class="label cursor-pointer gap-2">
              <input 
                type="checkbox" 
                name="selection_list[]" 
                value="travel"
                @checked(is_array(old('selection_list')) && in_array('travel', old('selection_list')))
                class="checkbox checkbox-primary" 
              />
              <span class="label-text">Travel</span>
            </label>
            <label class="label cursor-pointer gap-2">
              <input 
                type="checkbox" 
                name="selection_list[]" 
                value="cooking"
                @checked(is_array(old('selection_list')) && in_array('cooking', old('selection_list')))
                class="checkbox checkbox-primary" 
              />
              <span class="label-text">Cooking</span>
            </label>
            <label class="label cursor-pointer gap-2">
              <input 
                type="checkbox" 
                name="selection_list[]" 
                value="gaming"
                @checked(is_array(old('selection_list')) && in_array('gaming', old('selection_list')))
                class="checkbox checkbox-primary" 
              />
              <span class="label-text">Gaming</span>
            </label>
          </div>
        </fieldset>

        <div class="card-actions justify-end mt-6">
          <button 
            type="submit" 
            class="btn btn-primary w-full sm:w-auto group-invalid:pointer-events-none group-invalid:opacity-30">
            Submit Registration
          </button>
        </div>

      </form>
    </div>
  </div>
  <script>
    // Custom validation for checkboxes (at least one required)
    const form = document.querySelector('form');
    const checkboxes = document.querySelectorAll('input[name="selection_list[]"]');
    

    function validateCheckboxes() {
      const checkedCount = Array.from(checkboxes).filter(cb => cb.checked).length;
      checkboxes.forEach(cb => {
        if (checkedCount === 0) {
          cb.setCustomValidity('Please select at least one hobby');
        } else {
          cb.setCustomValidity('');
        }
      });
    }
    
    checkboxes.forEach(cb => {
      cb.addEventListener('change', validateCheckboxes);
    });
    
    /*form.addEventListener('submit', (e) => {
      e.preventDefault();
      validateCheckboxes();
      
      if (form.checkValidity()) {
        const formData = new FormData(form);
        console.log('Form submitted successfully!');
        console.log(Object.fromEntries(formData));
        
        // Show success toast notification
        showToast('Form is valid and ready to submit!', 'success');
      } else {
        // Show error toast notification
        showToast('Please fill in all required fields correctly.', 'error');
      }
    });*/
  </script>

</body>
</html>
