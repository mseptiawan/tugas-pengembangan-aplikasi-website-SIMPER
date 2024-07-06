<style>
    .announcement-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .announcement-box {
        background-color: #f44336;
        background-image: url("/img/banner-masuk.png");
        color: white;
        padding: 20px;
        position: relative;
        width: 100%;
        height: auto;
        border: #e4e4e4 2px solid;
        border-radius: 8px;
        height: 400px;
        display: block;
        max-width: 800px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        background-size: cover;
        background-position: center;
    }

    .announcement-text {
        display: block;
        margin-bottom: 10px;
    }

    .close-btn {
        background-color: transparent;
        border: none;
        color: white;
        font-size: 20px;
        cursor: pointer;
        position: absolute;
        top: 5px;
        right: 5px;
    }
</style>

<div class="announcement-container">
    <div class="announcement-box">
        <span class="announcement-text"></span>
        <button class="close-btn">&times;</button>
    </div>
</div>

<script>
    var closeBtn = document.querySelector('.close-btn');

    closeBtn.addEventListener('click', function() {
        var announcementContainer = document.querySelector('.announcement-container');
        announcementContainer.style.display = 'none';
    });
</script>