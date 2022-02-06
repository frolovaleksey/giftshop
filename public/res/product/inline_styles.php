<style type="text/css">
    html.bx-ios.bx-ios-fix-frame-focus, .bx-ios.bx-ios-fix-frame-focus body {
        -webkit-overflow-scrolling: touch
    }

    .bx-touch {
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0)
    }

    .bx-touch.crm-widget-button-mobile, .bx-touch.crm-widget-button-mobile body {
        height: 100%;
        overflow: auto
    }

    .b24-widget-button-shadow {
        position: fixed;
        background: rgba(33, 33, 33, .3);
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        visibility: hidden;
        z-index: 10100
    }

    .bx-touch .b24-widget-button-shadow {
        background: rgba(33, 33, 33, .75)
    }

    .b24-widget-button-inner-container {
        position: relative;
        display: inline-block
    }

    .b24-widget-button-position-fixed {
        position: fixed;
        z-index: 10000
    }

    .b24-widget-button-block {
        width: 66px;
        height: 66px;
        border-radius: 100%;
        box-sizing: border-box;
        overflow: hidden;
        cursor: pointer
    }

    .b24-widget-button-block .b24-widget-button-icon {
        opacity: 1
    }

    .b24-widget-button-block-active .b24-widget-button-icon {
        opacity: .7
    }

    .b24-widget-button-position-top-left {
        top: 50px;
        left: 50px
    }

    .b24-widget-button-position-top-middle {
        top: 50px;
        left: 50%;
        margin: 0 0 0 -33px
    }

    .b24-widget-button-position-top-right {
        top: 50px;
        right: 50px
    }

    .b24-widget-button-position-bottom-left {
        left: 50px;
        bottom: 50px
    }

    .b24-widget-button-position-bottom-middle {
        left: 50%;
        bottom: 50px;
        margin: 0 0 0 -33px
    }

    .b24-widget-button-position-bottom-right {
        right: 50px;
        bottom: 50px
    }

    .b24-widget-button-inner-block {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        height: 66px;
        border-radius: 100px;
        background: #00aeef;
        box-sizing: border-box
    }

    .b24-widget-button-icon-container {
        position: relative;
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1
    }

    .b24-widget-button-inner-item {
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        -webkit-transition: opacity .6s ease-out;
        transition: opacity .6s ease-out;
        -webkit-animation: socialRotateBack .4s;
        animation: socialRotateBack .4s;
        opacity: 0;
        overflow: hidden;
        box-sizing: border-box
    }

    .b24-widget-button-icon-animation {
        opacity: 1
    }

    .b24-widget-button-inner-mask {
        position: absolute;
        top: -8px;
        left: -8px;
        height: 82px;
        min-width: 66px;
        -webkit-width: calc(100% + 16px);
        width: calc(100% + 16px);
        border-radius: 100px;
        background: #00aeef;
        opacity: .2
    }

    .b24-widget-button-icon {
        -webkit-transition: opacity .3s ease-out;
        transition: opacity .3s ease-out;
        cursor: pointer
    }

    .b24-widget-button-icon:hover {
        opacity: 1
    }

    .b24-widget-button-inner-item-active .b24-widget-button-icon {
        opacity: 1
    }

    .b24-widget-button-wrapper {
        position: fixed;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-align: end;
        -ms-flex-align: end;
        align-items: flex-end;
        visibility: hidden;
        direction: ltr;
        z-index: 10150
    }

    .bx-imopenlines-config-sidebar {
        z-index: 10101
    }

    .b24-widget-button-visible {
        visibility: visible;
        -webkit-animation: b24-widget-button-visible 1s ease-out forwards 1;
        animation: b24-widget-button-visible 1s ease-out forwards 1
    }

    @-webkit-keyframes b24-widget-button-visible {
        from {
            -webkit-transform: scale(0);
            transform: scale(0)
        }
        30.001% {
            -webkit-transform: scale(1.2);
            transform: scale(1.2)
        }
        62.999% {
            -webkit-transform: scale(1);
            transform: scale(1)
        }
        100% {
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }

    @keyframes b24-widget-button-visible {
        from {
            -webkit-transform: scale(0);
            transform: scale(0)
        }
        30.001% {
            -webkit-transform: scale(1.2);
            transform: scale(1.2)
        }
        62.999% {
            -webkit-transform: scale(1);
            transform: scale(1)
        }
        100% {
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }

    .b24-widget-button-disable {
        -webkit-animation: b24-widget-button-disable .3s ease-out forwards 1;
        animation: b24-widget-button-disable .3s ease-out forwards 1
    }

    @-webkit-keyframes b24-widget-button-disable {
        from {
            -webkit-transform: scale(1);
            transform: scale(1)
        }
        50.001% {
            -webkit-transform: scale(.5);
            transform: scale(.5)
        }
        92.999% {
            -webkit-transform: scale(0);
            transform: scale(0)
        }
        100% {
            -webkit-transform: scale(0);
            transform: scale(0)
        }
    }

    @keyframes b24-widget-button-disable {
        from {
            -webkit-transform: scale(1);
            transform: scale(1)
        }
        50.001% {
            -webkit-transform: scale(.5);
            transform: scale(.5)
        }
        92.999% {
            -webkit-transform: scale(0);
            transform: scale(0)
        }
        100% {
            -webkit-transform: scale(0);
            transform: scale(0)
        }
    }

    .b24-widget-button-social {
        display: none
    }

    .b24-widget-button-social-item {
        position: relative;
        display: block;
        margin: 0 10px 10px 0;
        width: 45px;
        height: 44px;
        background-size: 100%;
        border-radius: 25px;
        -webkit-box-shadow: 0 8px 6px -6px rgba(33, 33, 33, .2);
        -moz-box-shadow: 0 8px 6px -6px rgba(33, 33, 33, .2);
        box-shadow: 0 8px 6px -6px rgba(33, 33, 33, .2);
        cursor: pointer
    }

    .b24-widget-button-social-item:hover {
        -webkit-box-shadow: 0 0 6px rgba(0, 0, 0, .16), 0 6px 12px rgba(0, 0, 0, .32);
        box-shadow: 0 0 6px rgba(0, 0, 0, .16), 0 6px 12px rgba(0, 0, 0, .32);
        -webkit-transition: box-shadow .17s cubic-bezier(0, 0, .2, 1);
        transition: box-shadow .17s cubic-bezier(0, 0, .2, 1)
    }

    .ui-icon.b24-widget-button-social-item, .ui-icon.connector-icon-45 {
        width: 46px;
        height: 46px;
        --ui-icon-size-md: 46px
    }

    .b24-widget-button-callback {
        background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20width%3D%2229%22%20height%3D%2230%22%20viewBox%3D%220%200%2029%2030%22%3E%3Cpath%20fill%3D%22%23FFF%22%20fill-rule%3D%22evenodd%22%20d%3D%22M21.872%2019.905c-.947-.968-2.13-.968-3.072%200-.718.737-1.256.974-1.962%201.723-.193.206-.356.25-.59.112-.466-.262-.96-.474-1.408-.76-2.082-1.356-3.827-3.098-5.372-5.058-.767-.974-1.45-2.017-1.926-3.19-.096-.238-.078-.394.11-.587.717-.718.96-.98%201.665-1.717.984-1.024.984-2.223-.006-3.253-.56-.586-1.103-1.397-1.56-2.034-.458-.636-.817-1.392-1.403-1.985C5.4%202.2%204.217%202.2%203.275%203.16%202.55%203.9%201.855%204.654%201.12%205.378.438%206.045.093%206.863.02%207.817c-.114%201.556.255%203.023.774%204.453%201.062%202.96%202.68%205.587%204.642%207.997%202.65%203.26%205.813%205.837%209.513%207.698%201.665.836%203.39%201.48%205.268%201.585%201.292.075%202.415-.262%203.314-1.304.616-.712%201.31-1.36%201.962-2.042.966-1.01.972-2.235.012-3.234-1.147-1.192-2.48-1.88-3.634-3.065zm-.49-5.36l.268-.047c.583-.103.953-.707.79-1.295-.465-1.676-1.332-3.193-2.537-4.445-1.288-1.33-2.857-2.254-4.59-2.708-.574-.15-1.148.248-1.23.855l-.038.28c-.07.522.253%201.01.747%201.142%201.326.355%202.53%201.064%203.517%202.086.926.958%201.59%202.125%201.952%203.412.14.5.624.807%201.12.72zm2.56-9.85C21.618%202.292%2018.74.69%2015.56.02c-.56-.117-1.1.283-1.178.868l-.038.28c-.073.537.272%201.04.786%201.15%202.74.584%205.218%201.968%207.217%204.03%201.885%201.95%203.19%204.36%203.803%207.012.122.53.617.873%201.136.78l.265-.046c.57-.1.934-.678.8-1.26-.71-3.08-2.223-5.873-4.41-8.14z%22/%3E%3C/svg%3E');
        background-repeat: no-repeat;
        background-position: center;
        background-color: #00aeef;
        background-size: 43%;
    }

    .b24-widget-button-whatsapp {
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 44 44' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M37.277 6.634C33.224 2.576 27.833.34 22.09.338 10.257.338.626 9.968.621 21.805a21.432 21.432 0 0 0 2.866 10.733L.44 43.662l11.381-2.985a21.447 21.447 0 0 0 10.26 2.613h.008c11.832 0 21.464-9.631 21.468-21.469a21.338 21.338 0 0 0-6.281-15.187ZM13.372 22.586c-.268-.358-2.19-2.909-2.19-5.55 0-2.64 1.385-3.937 1.877-4.474.491-.537 1.073-.671 1.43-.671.358 0 .716.003 1.029.019.329.017.771-.126 1.206.92.448 1.075 1.52 3.715 1.654 3.984.135.268.224.581.045.94-.178.357-.268.58-.536.894-.268.314-.563.7-.805.94-.268.267-.548.558-.235 1.095.313.537 1.389 2.293 2.984 3.716 2.049 1.828 3.777 2.394 4.314 2.662.536.269.849.224 1.162-.134.313-.358 1.34-1.566 1.698-2.103.358-.537.716-.447 1.207-.269.492.18 3.13 1.477 3.666 1.745.536.269.894.403 1.028.627.134.224.134 1.298-.313 2.55-.447 1.254-2.59 2.398-3.621 2.551-.924.138-2.094.196-3.379-.212a30.823 30.823 0 0 1-3.058-1.13c-5.38-2.324-8.895-7.742-9.163-8.1Z' fill='%23FFF'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: center;
        background-color: #00aeef;
        background-size: 43%;
    }

    .b24-widget-button-crmform {
        background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22%23FFF%22%20fill-rule%3D%22evenodd%22%20d%3D%22M22.407%200h-21.1C.586%200%200%20.586%200%201.306v21.1c0%20.72.586%201.306%201.306%201.306h21.1c.72%200%201.306-.586%201.306-1.305V1.297C23.702.587%2023.117%200%2022.407%200zm-9.094%2018.046c0%20.41-.338.737-.738.737H3.9c-.41%200-.738-.337-.738-.737v-1.634c0-.408.337-.737.737-.737h8.675c.41%200%20.738.337.738.737v1.634zm7.246-5.79c0%20.408-.338.737-.738.737H3.89c-.41%200-.737-.338-.737-.737v-1.634c0-.41.337-.737.737-.737h15.923c.41%200%20.738.337.738.737v1.634h.01zm0-5.8c0%20.41-.338.738-.738.738H3.89c-.41%200-.737-.338-.737-.738V4.822c0-.408.337-.737.737-.737h15.923c.41%200%20.738.338.738.737v1.634h.01z%22/%3E%3C/svg%3E');
        background-repeat: no-repeat;
        background-position: center;
        background-color: #00aeef;
        background-size: 43%;
    }

    .b24-widget-button-openline_livechat {
        background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20width%3D%2231%22%20height%3D%2228%22%20viewBox%3D%220%200%2031%2028%22%3E%3Cpath%20fill%3D%22%23FFF%22%20fill-rule%3D%22evenodd%22%20d%3D%22M23.29%2013.25V2.84c0-1.378-1.386-2.84-2.795-2.84h-17.7C1.385%200%200%201.462%200%202.84v10.41c0%201.674%201.385%203.136%202.795%202.84H5.59v5.68h.93c.04%200%20.29-1.05.933-.947l3.726-4.732h9.315c1.41.296%202.795-1.166%202.795-2.84zm2.795-3.785v4.733c.348%202.407-1.756%204.558-4.658%204.732h-8.385l-1.863%201.893c.22%201.123%201.342%202.127%202.794%201.893h7.453l2.795%203.786c.623-.102.93.947.93.947h.933v-4.734h1.863c1.57.234%202.795-1.02%202.795-2.84v-7.57c0-1.588-1.225-2.84-2.795-2.84h-1.863z%22/%3E%3C/svg%3E');
        background-repeat: no-repeat;
        background-position: center;
        background-color: #00aeef;
        background-size: 43%
    }

    .b24-widget-button-social-tooltip {
        position: absolute;
        top: 50%;
        left: -9000px;
        display: inline-block;
        padding: 5px 10px;
        max-width: 360px;
        border-radius: 10px;
        font: 13px/15px "Helvetica Neue", Arial, Helvetica, sans-serif;
        color: #000;
        background: #fff;
        text-align: center;
        text-overflow: ellipsis;
        white-space: nowrap;
        transform: translate(0, -50%);
        transition: opacity .6s linear;
        opacity: 0;
        overflow: hidden
    }

    @media (max-width: 480px) {
        .b24-widget-button-social-tooltip {
            max-width: 200px
        }
    }

    .b24-widget-button-social-item:hover .b24-widget-button-social-tooltip {
        left: 50px;
        -webkit-transform: translate(0, -50%);
        transform: translate(0, -50%);
        opacity: 1;
        z-index: 1
    }

    .b24-widget-button-close {
        display: none
    }

    .b24-widget-button-position-bottom-left .b24-widget-button-social-item:hover .b24-widget-button-social-tooltip, .b24-widget-button-position-top-left .b24-widget-button-social-item:hover .b24-widget-button-social-tooltip {
        left: 50px;
        -webkit-transform: translate(0, -50%);
        transform: translate(0, -50%);
        opacity: 1
    }

    .b24-widget-button-position-top-right .b24-widget-button-social-item:hover .b24-widget-button-social-tooltip, .b24-widget-button-position-bottom-right .b24-widget-button-social-item:hover .b24-widget-button-social-tooltip {
        left: -5px;
        -webkit-transform: translate(-100%, -50%);
        transform: translate(-100%, -50%);
        opacity: 1
    }

    .b24-widget-button-inner-container, .bx-touch .b24-widget-button-inner-container {
        -webkit-transform: scale(.85);
        transform: scale(.85);
        -webkit-transition: transform .3s;
        transition: transform .3s
    }

    .b24-widget-button-top .b24-widget-button-inner-container, .b24-widget-button-bottom .b24-widget-button-inner-container {
        -webkit-transform: scale(.7);
        transform: scale(.7);
        -webkit-transition: transform .3s linear;
        transition: transform .3s linear
    }

    .b24-widget-button-top .b24-widget-button-inner-block, .b24-widget-button-top .b24-widget-button-inner-mask, .b24-widget-button-bottom .b24-widget-button-inner-block, .b24-widget-button-bottom .b24-widget-button-inner-mask {
        background: #d6d6d6 !important;
        -webkit-transition: background .3s linear;
        transition: background .3s linear
    }

    .b24-widget-button-top .b24-widget-button-pulse, .b24-widget-button-bottom .b24-widget-button-pulse {
        display: none
    }

    .b24-widget-button-wrapper.b24-widget-button-position-bottom-right, .b24-widget-button-wrapper.b24-widget-button-position-bottom-middle, .b24-widget-button-wrapper.b24-widget-button-position-bottom-left {
        -webkit-box-orient: vertical;
        -webkit-box-direction: reverse;
        -ms-flex-direction: column-reverse;
        flex-direction: column-reverse
    }

    .b24-widget-button-bottom .b24-widget-button-social, .b24-widget-button-top .b24-widget-button-social {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: reverse;
        -ms-flex-direction: column-reverse;
        flex-direction: column-reverse;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -ms-flex-line-pack: end;
        align-content: flex-end;
        height: -webkit-calc(100vh - 110px);
        height: calc(100vh - 110px);
        -webkit-animation: bottomOpen .3s;
        animation: bottomOpen .3s;
        visibility: visible
    }

    .b24-widget-button-top .b24-widget-button-social {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: flex-start;
        padding: 10px 0 0 0;
        -webkit-animation: topOpen .3s;
        animation: topOpen .3s
    }

    .b24-widget-button-position-bottom-left.b24-widget-button-bottom .b24-widget-button-social {
        -ms-flex-line-pack: start;
        align-content: flex-start
    }

    .b24-widget-button-position-top-left.b24-widget-button-top .b24-widget-button-social {
        -ms-flex-line-pack: start;
        align-content: flex-start
    }

    .b24-widget-button-position-top-right.b24-widget-button-top .b24-widget-button-social {
        -ms-flex-line-pack: start;
        align-content: flex-start;
        -ms-flex-wrap: wrap-reverse;
        flex-wrap: wrap-reverse
    }

    .b24-widget-button-position-bottom-right.b24-widget-button-bottom .b24-widget-button-social, .b24-widget-button-position-bottom-left.b24-widget-button-bottom .b24-widget-button-social, .b24-widget-button-position-bottom-middle.b24-widget-button-bottom .b24-widget-button-social {
        -ms-flex-line-pack: start;
        align-content: flex-start;
        -ms-flex-wrap: wrap-reverse;
        flex-wrap: wrap-reverse;
        order: 1
    }

    .b24-widget-button-position-bottom-left.b24-widget-button-bottom .b24-widget-button-social {
        -ms-flex-wrap: wrap;
        flex-wrap: wrap
    }

    .b24-widget-button-position-bottom-left .b24-widget-button-social-item, .b24-widget-button-position-top-left .b24-widget-button-social-item, .b24-widget-button-position-top-middle .b24-widget-button-social-item, .b24-widget-button-position-bottom-middle .b24-widget-button-social-item {
        margin: 0 0 10px 10px
    }

    .b24-widget-button-position-bottom-left.b24-widget-button-wrapper {
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: flex-start
    }

    .b24-widget-button-position-top-left.b24-widget-button-wrapper {
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: flex-start
    }

    .b24-widget-button-position-bottom-middle.b24-widget-button-wrapper, .b24-widget-button-position-top-middle.b24-widget-button-wrapper {
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: flex-start;
        -ms-flex-line-pack: start;
        align-content: flex-start
    }

    .b24-widget-button-position-top-middle.b24-widget-button-top .b24-widget-button-social {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -ms-flex-line-pack: start;
        align-content: flex-start
    }

    .b24-widget-button-bottom .b24-widget-button-inner-item {
        display: none
    }

    .b24-widget-button-bottom .b24-widget-button-close {
        display: flex;
        -webkit-animation: socialRotate .4s;
        animation: socialRotate .4s;
        opacity: 1
    }

    .b24-widget-button-top .b24-widget-button-inner-item {
        display: none
    }

    .b24-widget-button-top .b24-widget-button-close {
        display: flex;
        -webkit-animation: socialRotate .4s;
        animation: socialRotate .4s;
        opacity: 1
    }

    .b24-widget-button-show {
        -webkit-animation: b24-widget-show .3s cubic-bezier(.75, .01, .75, 0) forwards;
        animation: b24-widget-show .3s cubic-bezier(.75, .01, .75, 0) forwards
    }

    @-webkit-keyframes b24-widget-show {
        from {
            opacity: 0
        }
        to {
            opacity: 1;
            visibility: visible
        }
    }

    @keyframes b24-widget-show {
        from {
            opacity: 0
        }
        to {
            opacity: 1;
            visibility: visible
        }
    }

    .b24-widget-button-hide {
        -webkit-animation: b24-widget-hidden .3s linear forwards;
        animation: b24-widget-hidden .3s linear forwards
    }

    @-webkit-keyframes b24-widget-hidden {
        from {
            opacity: 1;
            visibility: visible
        }
        50% {
            opacity: 1
        }
        99.999% {
            visibility: visible
        }
        100% {
            opacity: 0;
            visibility: hidden
        }
    }

    @keyframes b24-widget-hidden {
        from {
            opacity: 1;
            visibility: visible
        }
        50% {
            opacity: 1
        }
        99.999% {
            visibility: visible
        }
        100% {
            opacity: 0;
            visibility: hidden
        }
    }

    .b24-widget-button-hide-icons {
        -webkit-animation: hideIconsBottom .2s linear forwards;
        animation: hideIconsBottom .2s linear forwards
    }

    @-webkit-keyframes hideIconsBottom {
        from {
            opacity: 1
        }
        50% {
            opacity: 1
        }
        100% {
            opacity: 0;
            -webkit-transform: translate(0, 20px);
            transform: translate(0, 20px);
            visibility: hidden
        }
    }

    @keyframes hideIconsBottom {
        from {
            opacity: 1
        }
        50% {
            opacity: 1
        }
        100% {
            opacity: 0;
            -webkit-transform: translate(0, 20px);
            transform: translate(0, 20px);
            visibility: hidden
        }
    }

    @-webkit-keyframes hideIconsTop {
        from {
            opacity: 1
        }
        50% {
            opacity: 1
        }
        100% {
            opacity: 0;
            -webkit-transform: translate(0, -20px);
            transform: translate(0, -20px);
            visibility: hidden
        }
    }

    @keyframes hideIconsTop {
        from {
            opacity: 1
        }
        50% {
            opacity: 1
        }
        100% {
            opacity: 0;
            -webkit-transform: translate(0, -20px);
            transform: translate(0, -20px);
            visibility: hidden
        }
    }

    .b24-widget-button-popup-name {
        font: bold 14px "Helvetica Neue", Arial, Helvetica, sans-serif;
        color: #000
    }

    .b24-widget-button-popup-description {
        margin: 4px 0 0 0;
        font: 13px "Helvetica Neue", Arial, Helvetica, sans-serif;
        color: #424956
    }

    .b24-widget-button-close-item {
        width: 28px;
        height: 28px;
        background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20width%3D%2229%22%20height%3D%2229%22%20viewBox%3D%220%200%2029%2029%22%3E%3Cpath%20fill%3D%22%23FFF%22%20fill-rule%3D%22evenodd%22%20d%3D%22M18.866%2014.45l9.58-9.582L24.03.448l-9.587%209.58L4.873.447.455%204.866l9.575%209.587-9.583%209.57%204.418%204.42%209.58-9.577%209.58%209.58%204.42-4.42%22/%3E%3C/svg%3E');
        background-repeat: no-repeat;
        background-position: center;
        cursor: pointer
    }

    .b24-widget-button-wrapper.b24-widget-button-top {
        -webkit-box-orient: vertical;
        -webkit-box-direction: reverse;
        -ms-flex-direction: column-reverse;
        flex-direction: column-reverse
    }

    @-webkit-keyframes bottomOpen {
        from {
            opacity: 0;
            -webkit-transform: translate(0, 20px);
            transform: translate(0, 20px)
        }
        to {
            opacity: 1;
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0)
        }
    }

    @keyframes bottomOpen {
        from {
            opacity: 0;
            -webkit-transform: translate(0, 20px);
            transform: translate(0, 20px)
        }
        to {
            opacity: 1;
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0)
        }
    }

    @-webkit-keyframes topOpen {
        from {
            opacity: 0;
            -webkit-transform: translate(0, -20px);
            transform: translate(0, -20px)
        }
        to {
            opacity: 1;
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0)
        }
    }

    @keyframes topOpen {
        from {
            opacity: 0;
            -webkit-transform: translate(0, -20px);
            transform: translate(0, -20px)
        }
        to {
            opacity: 1;
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0)
        }
    }

    @-webkit-keyframes socialRotate {
        from {
            -webkit-transform: rotate(-90deg);
            transform: rotate(-90deg)
        }
        to {
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }
    }

    @keyframes socialRotate {
        from {
            -webkit-transform: rotate(-90deg);
            transform: rotate(-90deg)
        }
        to {
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }
    }

    @-webkit-keyframes socialRotateBack {
        from {
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg)
        }
        to {
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }
    }

    @keyframes socialRotateBack {
        from {
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg)
        }
        to {
            -webkit-transform: rotate(0);
        . b24-widget-button-inner-item transform: rotate(0)
        }
    }

    .b24-widget-button-popup {
        display: none;
        position: absolute;
        left: 100px;
        padding: 12px 20px 12px 14px;
        width: 312px;
        border: 2px solid #2fc7f7;
        background: #fff;
        border-radius: 15px;
        box-sizing: border-box;
        z-index: 1;
        cursor: pointer
    }

    .b24-widget-button-popup-triangle {
        position: absolute;
        display: block;
        width: 8px;
        height: 8px;
        background: #fff;
        border-right: 2px solid #2fc7f7;
        border-bottom: 2px solid #2fc7f7
    }

    .b24-widget-button-popup-show {
        display: block;
        -webkit-animation: show .4s linear forwards;
        animation: show .4s linear forwards
    }

    .b24-widget-button-position-top-left .b24-widget-button-popup-triangle {
        top: 19px;
        left: -6px;
        -webkit-transform: rotate(134deg);
        transform: rotate(134deg)
    }

    .b24-widget-button-position-bottom-left .b24-widget-button-popup-triangle {
        bottom: 25px;
        left: -6px;
        -webkit-transform: rotate(134deg);
        transform: rotate(134deg)
    }

    .b24-widget-button-position-bottom-left .b24-widget-button-popup, .b24-widget-button-position-bottom-middle .b24-widget-button-popup {
        bottom: 0;
        left: 75px
    }

    .b24-widget-button-position-bottom-right .b24-widget-button-popup-triangle {
        bottom: 25px;
        right: -6px;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg)
    }

    .b24-widget-button-position-bottom-right .b24-widget-button-popup {
        left: -320px;
        bottom: 0
    }

    .b24-widget-button-position-top-right .b24-widget-button-popup-triangle {
        top: 19px;
        right: -6px;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg)
    }

    .b24-widget-button-position-top-right .b24-widget-button-popup {
        top: 0;
        left: -320px
    }

    .b24-widget-button-position-top-middle .b24-widget-button-popup-triangle {
        top: 19px;
        left: -6px;
        -webkit-transform: rotate(134deg);
        transform: rotate(134deg)
    }

    .b24-widget-button-position-top-middle .b24-widget-button-popup, .b24-widget-button-position-top-left .b24-widget-button-popup {
        top: 0;
        left: 75px
    }

    .b24-widget-button-position-bottom-middle .b24-widget-button-popup-triangle {
        bottom: 25px;
        left: -6px;
        -webkit-transform: rotate(134deg);
        transform: rotate(134deg)
    }

    .bx-touch .b24-widget-button-popup {
        padding: 10px 22px 10px 15px
    }

    .bx-touch .b24-widget-button-popup {
        width: 230px
    }

    .bx-touch .b24-widget-button-position-bottom-left .b24-widget-button-popup {
        bottom: 90px;
        left: 0
    }

    .bx-touch .b24-widget-button-popup-image {
        margin: 0 auto 10px auto
    }

    .bx-touch .b24-widget-button-popup-content {
        text-align: center
    }

    .bx-touch .b24-widget-button-position-bottom-left .b24-widget-button-popup-triangle {
        bottom: -6px;
        left: 25px;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg)
    }

    .bx-touch .b24-widget-button-position-bottom-left .b24-widget-button-popup {
        bottom: 90px;
        left: 0
    }

    .bx-touch .b24-widget-button-position-bottom-right .b24-widget-button-popup {
        bottom: 90px;
        left: -160px
    }

    .bx-touch .b24-widget-button-position-bottom-right .b24-widget-button-popup-triangle {
        bottom: -6px;
        right: 30px;
        -webkit-transform: rotate(-45deg);
        transform: rotate(45deg)
    }

    .bx-touch .b24-widget-button-position-bottom-middle .b24-widget-button-popup {
        bottom: 90px;
        left: 50%;
        -webkit-transform: translate(-50%, 0);
        transform: translate(-50%, 0)
    }

    .bx-touch .b24-widget-button-position-bottom-middle .b24-widget-button-popup-triangle {
        bottom: -6px;
        left: 108px;
        -webkit-transform: rotate(134deg);
        transform: rotate(45deg)
    }

    .bx-touch .b24-widget-button-position-top-middle .b24-widget-button-popup {
        top: 90px;
        left: 50%;
        -webkit-transform: translate(-50%, 0);
        transform: translate(-50%, 0)
    }

    .bx-touch .b24-widget-button-position-top-middle .b24-widget-button-popup-triangle {
        top: -7px;
        left: auto;
        right: 108px;
        -webkit-transform: rotate(-135deg);
        transform: rotate(-135deg)
    }

    .bx-touch .b24-widget-button-position-top-left .b24-widget-button-popup {
        top: 90px;
        left: 0
    }

    .bx-touch .b24-widget-button-position-top-left .b24-widget-button-popup-triangle {
        left: 25px;
        top: -6px;
        -webkit-transform: rotate(-135deg);
        transform: rotate(-135deg)
    }

    .bx-touch .b24-widget-button-position-top-right .b24-widget-button-popup {
        top: 90px;
        left: -150px
    }

    .bx-touch .b24-widget-button-position-top-right .b24-widget-button-popup-triangle {
        top: -7px;
        right: 40px;
        -webkit-transform: rotate(-135deg);
        transform: rotate(-135deg)
    }

    .b24-widget-button-popup-btn-hide {
        position: absolute;
        top: 4px;
        right: 4px;
        display: inline-block;
        height: 20px;
        width: 20px;
        background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20width%3D%2210%22%20height%3D%2210%22%20viewBox%3D%220%200%2010%2010%22%3E%3Cpath%20fill%3D%22%23525C68%22%20fill-rule%3D%22evenodd%22%20d%3D%22M6.41%205.07l2.867-2.864-1.34-1.34L5.07%203.73%202.207.867l-1.34%201.34L3.73%205.07.867%207.938l1.34%201.34L5.07%206.41l2.867%202.867%201.34-1.34L6.41%205.07z%22/%3E%3C/svg%3E');
        background-repeat: no-repeat;
        background-position: center;
        opacity: .2;
        -webkit-transition: opacity .3s;
        transition: opacity .3s;
        cursor: pointer
    }

    .b24-widget-button-popup-btn-hide:hover {
        opacity: 1;
    }

    .bx-touch .b24-widget-button-popup-btn-hide {
        background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20width%3D%2214%22%20height%3D%2214%22%20viewBox%3D%220%200%2014%2014%22%3E%3Cpath%20fill%3D%22%23525C68%22%20fill-rule%3D%22evenodd%22%20d%3D%22M8.36%207.02l5.34-5.34L12.36.34%207.02%205.68%201.68.34.34%201.68l5.34%205.34-5.34%205.342%201.34%201.34%205.34-5.34%205.34%205.34%201.34-1.34-5.34-5.34z%22/%3E%3C/svg%3E');
        background-repeat: no-repeat
    }

    .b24-widget-button-popup-inner {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-flow: row wrap;
        flex-flow: row wrap
    }

    .b24-widget-button-popup-content {
        width: 222px
    }

    .b24-widget-button-popup-image {
        margin: 0 10px 0 0;
        width: 42px;
        text-align: center
    }

    .b24-widget-button-popup-image-item {
        display: inline-block;
        width: 42px;
        height: 42px;
        border-radius: 100%;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover
    }

    .b24-widget-button-popup-button {
        margin: 15px 0 0 0;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        text-align: center
    }

    .b24-widget-button-popup-button-item {
        display: inline-block;
        margin: 0 16px 0 0;
        font: bold 12px "Helvetica Neue", Arial, Helvetica, sans-serif;
        color: #08a6d8;
        text-transform: uppercase;
        border-bottom: 1px solid #08a6d8;
        -webkit-transition: border-bottom .3s;
        transition: border-bottom .3s;
        cursor: pointer
    }

    .b24-widget-button-popup-button-item:hover {
        border-bottom: 1px solid transparent
    }

    .b24-widget-button-popup-button-item:last-child {
        margin: 0
    }

    .b24-widget-button-pulse {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        border: 1px solid #00aeef;
        border-radius: 50%
    }

    .b24-widget-button-pulse-animate {
        -webkit-animation: widgetPulse infinite 1.5s;
        animation: widgetPulse infinite 1.5s
    }

    @-webkit-keyframes widgetPulse {
        50% {
            -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
            opacity: 1
        }
        100% {
            -webkit-transform: scale(2, 2);
            transform: scale(2, 2);
            opacity: 0
        }
    }

    @keyframes widgetPulse {
        50% {
            -webkit-transform: scale(1, 1);
            transform: scale(1, 1);
            opacity: 1
        }
        100% {
            -webkit-transform: scale(2, 2);
            transform: scale(2, 2);
            opacity: 0
        }
    }

    @media (min-height: 1024px) {
        .b24-widget-button-top .b24-widget-button-social, .b24-widget-button-bottom .b24-widget-button-social {
            max-height: 900px
        }
    }

    @media (max-height: 768px) {
        .b24-widget-button-top .b24-widget-button-social, .b24-widget-button-bottom .b24-widget-button-social {
            max-height: 600px
        }
    }

    @media (max-height: 667px) {
        .b24-widget-button-top .b24-widget-button-social, .b24-widget-button-bottom .b24-widget-button-social {
            max-height: 440px
        }
    }

    @media (max-height: 568px) {
        .b24-widget-button-top .b24-widget-button-social, .b24-widget-button-bottom .b24-widget-button-social {
            max-height: 380px
        }
    }

    @media (max-height: 480px) {
        .b24-widget-button-top .b24-widget-button-social, .b24-widget-button-bottom .b24-widget-button-social {
            max-height: 335px
        }
    }</style>
