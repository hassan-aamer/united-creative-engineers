<script>
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const Id = this.getAttribute('data-id');
            const status = this.checked ? 1 : 0;

            fetch("{{ route('admin.services.status', app()->getLocale()) }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id: Id,
                    status: status
                })
            })

        });
    });
</script>
