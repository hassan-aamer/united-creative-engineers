<script>
    function deleteData(id) {
        const form = document.getElementById(`deleteForm${id}`);
        const url = form.action;

        fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (response.ok) {
                    location.reload();
                } else {
                    alert('error');
                }
            })
            .catch(error => {
                console.error('error', error);
                alert('error');
            });
    }
</script>
