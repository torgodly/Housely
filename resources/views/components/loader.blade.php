<div class=" flex justify-center items-center py-10">

    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</div>
<style>
    /*
---------------------------------------------
Loader Style
---------------------------------------------
*/

    .js-preloader {
        /* You must change postion:relative; for position:fixed;  */
        position: relative;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: -webkit-box;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        opacity: 1;
        visibility: visible;
        z-index: 9999;
        -webkit-transition: opacity 0.25s ease;
        transition: opacity 0.25s ease;
    }

    .js-preloader.loaded {
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
    }

    @keyframes dot8567 {
        50% {
            -webkit-transform: translateX(96px);
            transform: translateX(96px);
        }
    }

    @keyframes dots723423 {
        50% {
            -webkit-transform: translateX(-31px);
            transform: translateX(-31px);
        }
    }

    .preloader-inner {
        position: relative;
        width: 142px;
        height: 40px;
        background: transparent;
    }

    .preloader-inner .dot {
        position: absolute;
        width: 16px;
        height: 16px;
        top: 12px;
        left: 15px;
        background: #e75e8d;
        border-radius: 50%;
        -webkit-transform: translateX(0);
        transform: translateX(0);
        -webkit-animation: dot8567 2.8s infinite;
        animation: dot8567 2.8s infinite;
    }

    .preloader-inner .dots {
        -webkit-transform: translateX(0);
        transform: translateX(0);
        margin-top: 12px;
        margin-left: 31px;
        -webkit-animation: dots723423 2.8s infinite;
        animation: dots723423 2.8s infinite;
    }

    .preloader-inner .dots span {
        display: block;
        float: left;
        width: 16px;
        height: 16px;
        margin-left: 16px;
        background: #e75e8d;
        border-radius: 50%;
    }

</style>
