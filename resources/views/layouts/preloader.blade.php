<style>
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #fff;
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
        /* pointer-events: none; */
    }

    .spinner {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #3498db;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .preloader.hide-preloader {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }
</style>
