function sharePost(platform) {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent(document.title);

    let shareUrl = '';

    if (platform === 'facebook') {
        shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
    } else if (platform === 'linkedin') {
        shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${url}`;
    } else if (platform === 'instagram') {
        navigator.clipboard.writeText(url)
            .then(() => alert('Linku u kopjua për Instagram!'))
            .catch((err) => alert('Kopjimi dështoi: ' + err));
        return;
    }

    if (shareUrl) {
        window.open(shareUrl, '_blank');
    }
}

function submitComment() {
    const textarea = document.querySelector('.comments-section textarea');
    const commentsList = document.getElementById('comments-list');
    const commentText = textarea.value.trim();

    if (commentText) {
        const comment = document.createElement('div');
        comment.textContent = commentText;
        comment.style.padding = '10px';
        comment.style.marginTop = '10px';
        comment.style.marginBottom = '10px';
        comment.style.background = '#f4f4f4';
        comment.style.borderRadius = '5px';
        commentsList.appendChild(comment);
        textarea.value = ''; // Pastro tekstin
    } else {
        alert('Ju lutem shkruani një koment!');
    }
}
