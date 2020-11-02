window.addEventListener('DOMContentLoaded', () => {

    const token = document.head.querySelector("meta[name='csrf-token']").content;
    const deleteBtn = document.getElementById('deleteBtn');
    const modal = document.getElementById('modal');
    const cancelDeleteBtn = document.getElementById('cancel-delete');
    const submitDeleteBtn = document.getElementById('submit-delete');
    const postId = document.getElementById('postBody').dataset['postid'];

    deleteBtn.addEventListener('click', (event) => {
        event.preventDefault();
        modal.classList.toggle('hidden');
    });
    cancelDeleteBtn.addEventListener('click', (event) => {
        event.preventDefault();
        modal.classList.toggle('hidden');
    });
    submitDeleteBtn.addEventListener('click', (event) => {
        event.preventDefault();

        let xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        console.log(xhr);
        xhr.onload = function(){
            if(this.status == 200){
                modal.classList.toggle('hidden');
                window.location.replace(redirectUrl);
            }
        }
        xhr.send();
    });
});