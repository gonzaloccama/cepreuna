<style>
    time.calendar-edit {
        font-size: 0.85em; /* change icon size */
        display: block;
        position: relative;
        width: 5em;
        height: 5em;
        background-color: #fff;
        overflow: hidden;
        border: 1px solid #00365A;
    }

    time.calendar-edit * {
        display: block;
        width: 100%;
        font-size: 0.7em;
        font-weight: 600;
        font-style: normal;
        text-align: center;
    }

    time.calendar-edit strong {
        position: absolute;
        top: 0;
        padding: 0.15em 0;
        color: #fff;
        background-color: #00365A;
        border-bottom: 1px dashed #0761fc;
        box-shadow: 0 2px 0 #00365A;
    }

    time.calendar-edit em {
        position: absolute;
        bottom: 0.08em;
        color: #00365A;
    }

    time.calendar-edit span {
        font-size: 1.9em;
        letter-spacing: -0.1em;
        padding-top: 0.95em;
        color: #2f2f2f;
    }

    /*/*/
    .active-menu a span {
        color: #fff !important;
        border-bottom: 1px dashed #fff;
    }

    .active-menu a span:hover {
        color: #ff5e13 !important;
        border-bottom: 1px dashed #ff5e13;
    }

    .active-menu a span:before {
        content: '\A';
        white-space: pre;
    }

    .active-menu a span:after {
        content: '\A';
        white-space: pre;
    }

    .active-sub-menu {
        color: #ff5e13 !important;
        border-bottom: 1px solid #ff5e13;
        border-top: 1px solid #ff5e13;
    }

    /*/*/
    .badge-success-1 {
        border: 1px dashed #0c4128;
        background-color: rgba(10, 52, 32, 0.15);
    }

    .badge-danger-1 {
        border: 1px dashed #60001a;
        background-color: rgba(164, 32, 44, 0.15);
    }

    /*/*/
    .swal2-popup {
        border-radius: 0 !important;
        box-shadow: 1px 1px 10px rgba(255, 255, 255, 0.37);
    }

    h1 .breadcrumb-subtitle {
        font-size: 28px;
        color: #b8bec6;
        font-weight: 400;
    }

    /***** responsive breadcrumb ****/
    @media screen and (max-width: 600px) {
        h1 .breadcrumb-subtitle {
            font-size: 14px;
            color: #b8bec6;
            font-weight: 400;
        }
    }

    @media screen and (max-width: 760px) {
        h1 .breadcrumb-subtitle {
            font-size: 15px;
            color: #b8bec6;
            font-weight: 400;
        }
    }

    .separator-vertical {
        border-left: 1px dashed rgba(183, 181, 181, 0.82);
        height: 30px;
        vertical-align: middle;
        margin-bottom: 5px;
    }

    /***** loading ****/
    #progress {
        position: fixed;
        z-index: 1;
        top: 0;
        left: -6px;
        width: 1%;
        height: 6px;
        background-color: #027205;
        -moz-border-radius: 1px;
        -webkit-border-radius: 1px;
        border-radius: 1px;
        -moz-transition: width 600ms ease-out, opacity 500ms linear;
        -ms-transition: width 600ms ease-out, opacity 500ms linear;
        -o-transition: width 600ms ease-out, opacity 500ms linear;
        -webkit-transition: width 600ms ease-out, opacity 500ms linear;
        transition: width 1000ms ease-out, opacity 500ms linear;
    }

    b.top-progress, i.top-i {
        position: absolute;
        top: 0;
        height: 3px;

        -moz-box-shadow: #777777 1px 0 6px 1px;
        -ms-box-shadow: #777777 1px 0 6px 1px;
        -webkit-box-shadow: #777777 1px 0 6px 1px;
        box-shadow: #777777 1px 0 6px 1px;

        -moz-border-radius: 100%;
        -webkit-border-radius: 100%;
        border-radius: 100%;
    }

    b.top-progress {
        clip: rect(-6px, 22px, 14px, 10px);
        opacity: .6;
        width: 20px;
        right: 0;
    }

    i.top-i {
        clip: rect(-6px, 90px, 14px, -6px);
        opacity: .6;
        width: 180px;
        right: -80px;
    }

    /*** popup message chat-box ***/

    .hover_bkgr_fricc {
        background: rgba(0, 0, 0, .4);
        cursor: pointer;
        display: none;
        height: 100%;
        position: fixed;
        text-align: left;
        top: 0;
        width: 100%;
        z-index: 10000;
    }

    .hover_bkgr_fricc .helper {
        display: inline-block;
        height: 100%;
        vertical-align: bottom;
    }

    .hover_bkgr_fricc > div {
        background-color: #fff;
        box-shadow: 10px 10px 60px #555;
        display: inline-block;
        height: auto;
        max-width: 551px;
        min-height: 100px;
        vertical-align: middle;
        width: 60%;
        position: relative;
        border-radius: 8px;
        padding: 15px 5%;
    }

    .popupCloseButton {
        background-color: #fff;
        border: 3px solid #999;
        border-radius: 50px;
        cursor: pointer;
        display: inline-block;
        font-family: arial;
        font-weight: bold;
        position: absolute;
        top: -20px;
        right: -20px;
        font-size: 25px;
        line-height: 30px;
        width: 30px;
        height: 30px;
        text-align: center;
    }

    .popupCloseButton:hover {
        background-color: #ccc;
    }

    .trigger_popup_fricc {
        cursor: pointer;
        font-size: 20px;
        margin: 20px;
        display: inline-block;
        font-weight: bold;
    }

    /*** into login ***/
    .card-user-login {
        width: 160px;
        background-color: #fff;
        padding: 5px;
    }

    .hover-user {
        padding: 10px 5px 10px 10px;
        color: #00365A !important;
    }

    .hover-user .text-left {
        font-size: 14px;
    }

    .hover-user:hover {
        background-color: #00365A;
        color: #fff !important;
        cursor: pointer;
    }

    /*** scrollbar ***/
    body::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 8px;
        background-color: #F5F5F5;
    }

    body::-webkit-scrollbar {
        width: 8px;
        background-color: #F5F5F5;
    }

    body::-webkit-scrollbar-thumb {
        border-radius: 8px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #00365A;
    }

    /*** forms ***/

    .form-contact:focus {
        border: 1px solid #00365A !important;
        box-shadow: 0 0 5px 0 rgba(13, 45, 98, 0.29) !important;
    }

    /***  date crop  ***/
    div.calendarDate {
        font-size: 0.6em; /*change calendarIcon size */
        display: block;
        position: relative;
        width: 5em;
        height: 5em;
        background-color: #fff;
        border-radius: 0.0em;
        /*-moz-border-radius: 0.7em;*/
        /*box-shadow: 0 1px 0 #bdbdbd, 0 2px 0 #fff, 0 3px 0 #bdbdbd,*/
        /*0 4px 0 #fff, 0 5px 0 #bdbdbd, 0 0 0 1px #bdbdbd;*/
        overflow: hidden;
    }

    div.calendarDate * {
        display: block;
        width: 100%;
        font-size: 0.9em;
        font-weight: bold;
        font-style: normal;
        text-align: center;
    }

    div.calendarDate strong {
        position: absolute;
        top: 0;
        padding: 0.2em 0;
        color: #fff;
        background-color: #00365a;
        /*border-bottom: 1px dashed #ddd;*/
        box-shadow: 0 2px 0 #00365a;
    }

    div.calendarDate em {
        position: absolute;
        bottom: 0em;
        color: #fff;
        padding-top: .2em;
        height: 1.6em;
        background-color: #00365a;
    }

    div.calendarDate span {
        font-size: 2.0em;
        letter-spacing: -0.05em;
        padding-top: 0.7em;
        color: #2f2f2f;
    }

    /*** form validation ***/
    .is-invalid {
        border: 1px solid #80011a !important;
    }

    .is-invalid:focus {
        border: 1px solid #80011a !important;
        box-shadow: 0 0 5px 0 rgba(128, 1, 26, 0.29) !important;
    }

    /*** menu header dropdown ***/
    /*.dropdown:hover .dropdown-menu{*/
    /*    display: block;*/
    /*}*/

    .dropdown-menu {
        border-radius: 0;
    }

    .dropdown-menu a:hover {
        background-color: #00365a;
    }

    .font-13 {
        font-size: 13px;
    }

    .font-rajdhani-16 {
        font-family: "Rajdhani", sans-serif !important;
        font-size: 16px;
    }

    .font-rajdhani {
        font-family: "Rajdhani", sans-serif !important;
    }

    .btn-login {
        border: 1px dashed #fff !important;
        border-radius: 0;
    }

    .btn-login-responsive {
        border: 1px dashed #00365A !important;
        border-radius: 0;
    }


    .py-55 {
        padding: 55px 0;
    }

    @media (max-width: 1199.98px) {
        .py-115 {
            padding: 50px 0;
        }
    }

    @media (max-width: 991.98px) {
        .py-115 {
            padding: 40px 0;
        }
    }

    @media (max-width: 767.98px) {
        .py-115 {
            padding: 30px 0;
        }
    }

    /*** icons social medias ***/
    .btn.btn-social-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .template-demo > .btn {
        margin-right: 1.0rem !important;
        padding-top: 0.8rem !important;
    }

    .template-demo {
        margin-top: 0.5rem !important
    }

    .btn-outline-facebook {
        border: 1px solid #3b579d;
        color: #3b579d
    }

    .btn-outline-facebook:hover {
        background: #3b579d;
        color: #ffffff
    }

    .btn-outline-whatsapp {
        border: 1px solid #31983d;
        color: #31983d
    }

    .btn-outline-whatsapp:hover {
        background: #31983d;
        color: #ffffff
    }

    .btn-outline-youtube {
        border: 1px solid #e52d27;
        color: #e52d27
    }

    .btn-outline-twitter {
        border: 1px solid #2caae1;
        color: #2caae1
    }

    .btn-outline-linkedin {
        border: 1px solid #0177b5;
        color: #0177b5
    }

    .btn-outline-instagram {
        border: 1px solid #dc4a38;
        color: #dc4a38
    }

    .btn-outline-twitter:hover {
        background: #2caae1;
        color: #ffffff
    }

    .btn-outline-linkedin:hover {
        background: #0177b5;
        color: #ffffff
    }

    .btn-outline-youtube:hover {
        background: #e52d27;
        color: #ffffff
    }

    .btn-outline-instagram:hover {
        background: #e52d27;
        color: #ffffff
    }


</style>
<style>

    details {
        width: 100%;
        min-height: 5px;
        padding: 15px 30px 15px 30px;
        margin: 0 auto;
        position: relative;
        font-size: 24px;
        border: 1px solid rgba(0, 0, 0, .1);
        box-sizing: border-box;
        transition: all .3s;
        background-color: #00365A;
    }

    details + details {
        margin-top: 10px;
    }

    details[open] {
        min-height: 50px;
        background-color: #f6f7f8;
        box-shadow: 2px 2px 20px rgba(0, 0, 0, .2);
    }

    details[open] summary {
        color: #00365A;
        font-weight: 600;
    }

    details div ul p {
        color: #454545;
        font-weight: 200;
    }

    summary {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 200;
        cursor: pointer;
        color: #fff;
    }

    summary:focus {
        outline: none;
    }

    summary:focus::after {
        content: "";
        height: 100%;
        width: 100%;
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        box-shadow: 0 0 0 1px #00365A;
    }

    summary::-webkit-details-marker {
        display: none
    }

    details .control-icon {
        fill: #fff;
    }

    details[open] .control-icon {
        fill: #00365A;
        transition: .3s ease;
        pointer-events: none;
    }

    .control-icon-close {
        display: none;
    }

    details[open] .control-icon-close {
        display: initial;
        transition: .3s ease;
    }

    details[open] .control-icon-expand {
        display: none;
    }

</style>
