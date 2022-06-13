<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", () => {
        window.addEventListener('save', (event) => {
            var Toast = Swal.mixin({
                toast: true
                , position: 'top-end'
                , showConfirmButton: false
                , timer: 3000
                , timerProgressBar: true
                , onOpen: function(toast) {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success'
                , title: 'Successfully saved'
            })



        })


    })
</script>