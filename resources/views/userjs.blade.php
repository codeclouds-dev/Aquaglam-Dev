<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- bootstrap scripts  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<!-- Custom Css  -->
<script src="./scripts/custom.js"></script>
<!-- owl-carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        autoplay: true,

        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: false
            },
            1000: {
                items: 2,
                nav: true,
                loop: false
            }
        }
    })
</script>



{{-- <script>
$(document).ready(function(){
    
    $('#loginForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        $.ajax({
            var email = $('#email').val();
            var pass = $('#password').val();
            console.log(pass);
            
            url: "{{ route('customer.login') }}", // Laravel route for login
            method: 'POST',
            data: {
                email: email,
                password: pass,
                _token: "{{ csrf_token() }}" // CSRF token
            },
            success: function(response) {
                var res = JSON.parse(response);
                console.log(res);

                // if(response.success) {
                //     // Hide the modal and redirect to a protected page, or display a success message
                //     $('#loginModal').modal('hide');
                //     // window.location.href = response.redirect;
                //     window.location.href = "{{ route('home.index') }}"; // Redirect to the home page
                // }
            },
            error: function(response) {
                var res = JSON.parse(response);
                console.log(res);
                // $("#loginModal").addClass("show");
                // $('#loginModal').modal('show'); 
            }
        });
    });
    
});
</script> --}}

</body>

</html>