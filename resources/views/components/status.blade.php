@if (session('success'))
    <div id="success" class="bg-green-500 text-white py-2 px-2 rounded-xl mx-auto flex justify-center items-center">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div id="error" class="bg-red-500 py-2 mx-auto flex justify-center items-center px-2 text-white">
        {{ session('error') }}
    </div>
@endif

<script>
    setTimeout(() => {
        let successAlert = document.getElementById('success');
        if (successAlert) {
            successAlert.style.display = 'none'; // Hides the success message
        }
    }, 3000);

    setTimeout(() => {
        let errorAlert = document.getElementById('error');
        if (errorAlert) {
            errorAlert.style.display = 'none'; // Hides the error message
        }
    }, 3000);
</script>
