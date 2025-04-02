<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kontakti</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="contact_responsive.css">
    <link rel="icon" type="image/x-icon" href="logo-favicon.png">
</head>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="contact.js"></script>

<body>
    <div id="navbar-placeholder"></div>

    <section id="contact-header">
        <h1>Kontakti</h1>
    </section>

    <section id="contact-section">
        <div id="form-container">
            <h2>Plotësoni formen</h2>
            <form id="contact-form">
                <div class="contact-container">
                    <label for="name">Emri:</label>
                    <input type="text" id="name" name="name" minlength="2" maxlength="20" required autocomplete="on"
                        autofocus placeholder="Shkruani emrin..."><br>

                    <label for="surname">Mbiemri:</label>
                    <input type="text" id="surname" name="surname" minlength="2" maxlength="20" required
                        placeholder="Shkruani mbiemrin tuaj..."><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required placeholder="Email-adresa juaj..."><br>
                    <button onclick="validateEmail()" style="font-size: 12px;">Verifiko Email</button>

                    <label for="phone">Numri i telefonit:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Numri juaj i telefonit..."
                        pattern="[0-9]{9}">
                </div>
                <fieldset>
                    <legend>Zgjedhni llojin e mesazhit</legend>
                    <div class="radio-container">
                        <input type="radio" name="lloji" id="sugjerim">
                        <label for="sugjerim" class="radio-label">Sugjerim</label>
                    </div>
                    <div class="radio-container">
                        <input type="radio" name="lloji" id="ankese">
                        <label for="ankese" class="radio-label">Ankesë</label>
                    </div>
                    <div class="radio-container">
                        <input type="radio" name="lloji" id="kerkese">
                        <label for="kerkese" class="radio-label">Kërkesë</label>
                    </div>
                    <div class="radio-container">
                        <input type="radio" name="lloji" id="tjeter">
                        <label for="tjeter" class="radio-label">Tjetër</label>
                    </div>
                </fieldset>

                <textarea placeholder="Shkruani mesazhin tuaj..." id="mesazhi" rows="3" cols="50"
                    oninput="countchar()"></textarea>
                <p style="font-size: 12px;">Numri i karaktereve: <output id="charCount"></output></p>

                <div class="menyra">
                    <label for="contact-method">Në cilën mënyrë deshironi të kontaktoheni?</label>
                    <input list="contact-methods" id="contact-method" name="contact-method" placeholder="Psh. Email">

                    <datalist id="contact-methods">
                        <option value="Email"></option>
                        <option value="Thirrje telefonike"></option>
                        <option value="SMS"></option>
                    </datalist>
                </div>
                <br>
                <input type="checkbox" id="accept" required>
                <label for="accept">Pranoj të kontaktohem përmes të dhënave të kontaktit personal.</label><br>

                <button type="submit">Dërgo</button>
            </form>
        </div>
        <div id="map-container">
            <h2 style="padding: 10px 100px 10px 100px;">Harta</h2>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2938.0921316734953!2d21.026934475425666!3d42.574566921523584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13537ccdea831979%3A0x7bd7c5dfd98fabc!2sPrishtina%20International%20Airport%20%E2%80%9CAdem%20Jashari%E2%80%9D!5e0!3m2!1sen!2s!4v1733827840536!5m2!1sen!2s"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
    </section>

    <section id="specific-contacts">
        <h2>Kontakti specifik</h2>

        <details>
            <summary>Kontakto përmes llogarisë personale</summary>
            <form id="personal-acc-form" onsubmit="return validateLogin()">
                <label for="username">Emri i llogarise</label>
                <input type="text" id="username" name="username" required> <br>

                <label for="password">Fjalëkalimi</label>
                <input type="password" id="password" name="password" required> <br>

                <button type="submit"><b>Kyçu</b></button>
            </form>
        </details>

        <details>
            <summary>Zyra e informacionit</summary>
            <div class="contact-item">
                <p>Numri i telefonit: +38343111222</p>
            </div>
            <div class="contact-item">
                <p>Email: <a href="information@limakkosovo.aero">information@limakkosovo.aero</a></p>
            </div>

        </details>

        <details>
            <summary>Gjësendet e humbura</summary>
            <div class="contact-item">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" height="20" width="20"
                    alt="simboli e telefonit">
                    <path fill="#FFCC43"
                        d="M41.996 12.852s5.972 4.463 6.472 16.463l-5.5.833 10.167 15.667 11.833-15-4.5-1c.001 0 .056-12.093-18.472-16.963z" />
                    <path fill="#667BBC"
                        d="M26.636 12.648s-12.833 6.5-12.833 14.333 7.666 22.833 12.166 31 9.594 12.079 17.834 10.666c5.833-1 8.667-4 8.667-4l-2.833-7.333-4.119-4.899-6.548-.934-4.333-3-6-13.667 3.5-7.667v-4.333l-5.501-10.166z" />
                    <path fill="#131731"
                        d="M25.898 60.848 13.876 36.607a17.121 17.121 0 0 1-1.797-7.636c-.002-6.331 3.512-12.425 9.567-15.43l6.02-2.987.684 1.296c1.451 2.755 2.894 5.63 3.989 8.118 1.085 2.535 1.865 4.488 1.908 6.124a2.904 2.904 0 0 1-.141.935c-.565 1.626-1.624 2.991-2.466 4.341-.862 1.34-1.451 2.591-1.433 3.59.002.432.086.844.319 1.318l5.938 11.969c.735 1.363 1.395 1.552 3.083 1.809 1.632.203 3.927.099 6.448.938l-.478 1.423.478-1.423c.955.352 1.558.977 2.245 1.757.669.79 1.351 1.776 2.064 2.928 1.423 2.301 2.962 5.258 4.478 8.397l.645 1.336-6.466 3.206a17.163 17.163 0 0 1-7.634 1.794c-6.331.006-12.424-3.506-15.429-9.562zm-2.919-44.619c-5.002 2.48-7.897 7.511-7.899 12.743 0 2.121.474 4.269 1.483 6.303l12.021 24.241c2.48 5.002 7.509 7.897 12.743 7.899 2.119 0 4.267-.477 6.301-1.483l3.801-1.884c-1.087-2.2-2.169-4.254-3.17-5.95-1.182-2.028-2.325-3.567-2.966-4.08a1.205 1.205 0 0 0-.257-.181v.002c-1.896-.649-3.847-.585-5.835-.802-1.929-.163-4.259-.981-5.425-3.455L27.839 37.61a5.88 5.88 0 0 1-.631-2.651c.016-2.056.985-3.734 1.897-5.194.912-1.422 1.824-2.71 2.14-3.639v-.033c.043-.498-.599-2.581-1.654-4.916-.879-2.004-2.023-4.326-3.218-6.631l-3.394 1.683zM40.012 28.764h6.974c-.53-6.052-3.618-11.356-5.223-13.69-.575-.842-.927-1.271-.927-1.271l-2.743-3.353 4.229.939c9.339 2.059 14.401 6.705 16.971 10.877 1.659 2.679 2.321 5.126 2.584 6.574l6.325.37-14.243 19.943-13.947-20.389zm13.999 15.153 8.593-12.029-3.494-.207-.057-1.354c-.004 0-.004-.123-.048-.446a12.975 12.975 0 0 0-.278-1.407 16.506 16.506 0 0 0-1.984-4.626c-1.854-2.962-5.115-6.293-11.212-8.435 1.951 3.306 4.415 8.661 4.531 14.831l.022 1.522h-4.387l8.314 12.151zm-12.34-29.601.326-1.464-.326 1.464z" />
                </svg>
                <p>Numri i telefonit: +38343222333</p>
            </div>
            <div class="contact-item">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" width="20" height="20"
                    alt="simboli i email">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #ffc247
                            }

                            .cls-2 {
                                fill: #ffe45c
                            }

                            .cls-9 {
                                fill: #e9edf5
                            }

                            .cls-10 {
                                fill: #2b1505
                            }
                        </style>
                    </defs>
                    <g id="_12-Email" data-name="12-Email">
                        <path class="cls-1"
                            d="m57 21 .24-.24A5.944 5.944 0 0 1 59 25v28a5.944 5.944 0 0 1-1.76 4.24L57 57 36 36l-.06-.08zM3 57l-.24.24A5.944 5.944 0 0 1 1 53V25a5.944 5.944 0 0 1 1.76-4.24L3 21l21.06 14.92L24 36z" />
                        <path class="cls-2"
                            d="m57 57 .24.24A5.944 5.944 0 0 1 53 59H7a5.944 5.944 0 0 1-4.24-1.76L3 57l21-21 .06-.08L27 38a4.38 4.38 0 0 0 3 1 4.38 4.38 0 0 0 3-1l2.94-2.08.06.08z" />
                        <path class="cls-2"
                            d="M2.76 20.76A5.944 5.944 0 0 1 7 19h46a5.944 5.944 0 0 1 4.24 1.76L57 21 35.94 35.92 33 38a4.38 4.38 0 0 1-3 1 4.38 4.38 0 0 1-3-1l-2.94-2.08L3 21z" />
                        <path class="cls-1"
                            d="M27 42a4.38 4.38 0 0 0 3 1 4.38 4.38 0 0 0 3-1l2.94-2.08 2.33-1.65L36 36l-.06-.08L33 38a4.38 4.38 0 0 1-3 1 4.38 4.38 0 0 1-3-1l-2.94-2.08L24 36l-2.27 2.27 2.33 1.65z" />
                        <path d="M55 55H5l-2 2-.24.24A5.944 5.944 0 0 0 7 59h46a5.944 5.944 0 0 0 4.24-1.76L57 57z"
                            style="fill:#ffda45" />
                        <g style="opacity:.54">
                            <path
                                d="M13.616 19H7a5.944 5.944 0 0 0-4.24 1.76L3 21l4.862 3.444-.1-.219C9.252 20.989 11.323 19 13.616 19z"
                                style="fill:#fff" />
                        </g>
                        <path
                            d="M43 1a16 16 0 1 1-12.82 25.54A20.715 20.715 0 0 0 26 31a12.222 12.222 0 0 1 2.4-7.48A15.979 15.979 0 0 1 43 1z"
                            style="fill:#f2f6fc" />
                        <path
                            d="M59 17A15.984 15.984 0 0 0 36.463 2.4a15.991 15.991 0 0 1 10.074 30.2A15.992 15.992 0 0 0 59 17z"
                            style="fill:#cdd2e1" />
                        <path
                            d="M53 17a9.988 9.988 0 0 1-4.82 8.55L48 25v-1a5 5 0 0 0-5-5 4 4 0 1 0-4-4 4 4 0 0 0 4 4 5 5 0 0 0-5 5v1l-.98.01A10 10 0 1 1 53 17z"
                            style="fill:#65b1fc" />
                        <circle class="cls-9" cx="43" cy="15" r="4" />
                        <path class="cls-9" d="m48 25 .18.55a9.979 9.979 0 0 1-11.16-.54L38 25v-1a5 5 0 0 1 10 0z" />
                        <path class="cls-10"
                            d="M60 17a17 17 0 0 0-34 0c0 .335.029.667.048 1H7a7.008 7.008 0 0 0-7 7v28a7.008 7.008 0 0 0 7 7h46a7.008 7.008 0 0 0 7-7V25a7 7 0 0 0-.731-3.083A16.96 16.96 0 0 0 60 17zM43 2a15 15 0 0 1 0 30 14.864 14.864 0 0 1-12.019-6.057.994.994 0 0 0-.657-.392.873.873 0 0 0-.144-.011 1 1 0 0 0-.6.2 17.415 17.415 0 0 0-2.132 1.91 10.757 10.757 0 0 1 1.752-3.53 1 1 0 0 0 .112-1.009A14.855 14.855 0 0 1 28 17 15.017 15.017 0 0 1 43 2zM26.279 20a16.914 16.914 0 0 0 .981 3.4A13.222 13.222 0 0 0 25 31a1 1 0 0 0 1.832.555 20.81 20.81 0 0 1 3.189-3.6A16.83 16.83 0 0 0 38 33.236l-5.574 3.948a1.1 1.1 0 0 0-.117.1A3.469 3.469 0 0 1 30 38a3.478 3.478 0 0 1-2.293-.707 1.033 1.033 0 0 0-.129-.109L4.387 20.757A4.955 4.955 0 0 1 7 20zM2 25a4.959 4.959 0 0 1 .9-2.846l19.629 13.9L2.833 55.753A4.969 4.969 0 0 1 2 53zm5 33a4.969 4.969 0 0 1-2.753-.833L24.184 37.23l2.184 1.548A5.441 5.441 0 0 0 30 40a5.441 5.441 0 0 0 3.632-1.222l2.184-1.548 19.937 19.937A4.969 4.969 0 0 1 53 58zm51-33v28a4.969 4.969 0 0 1-.833 2.753L37.472 36.058l3.162-2.24A16.813 16.813 0 0 0 58 24.985z" />
                        <path class="cls-10"
                            d="M43 28a11 11 0 1 0-11-11 11.013 11.013 0 0 0 11 11zm-4.009-2.954c0-.016.009-.03.009-.046v-1a4 4 0 0 1 8 0v1c0 .016.008.03.009.046a8.9 8.9 0 0 1-8.018 0zM40 15a3 3 0 1 1 3 3 3 3 0 0 1-3-3zm3-7a8.987 8.987 0 0 1 5.985 15.7 5.994 5.994 0 0 0-2.872-4.822 5 5 0 1 0-6.226 0 5.994 5.994 0 0 0-2.872 4.822A8.987 8.987 0 0 1 43 8z" />
                    </g>
                </svg>
                <p>Email: <a href="lostandfound@limakkosovo.aero">lostandfound@limakkosovo.aero</a></p>
            </div>
        </details>
    </section>

    <section id="social-media-contact">
        <h2>Na kontaktoni përmes rrjeteve sociale</h2>
        <div class="social-icons">
            <a href="https://www.facebook.com/airportpristina?locale=sq_AL" target="_blank" aria-label="Facebook">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50"
                    style="fill:#228BE6;" alt="ikona e facebook">
                    <path
                        d="M25,3C12.85,3,3,12.85,3,25c0,11.03,8.125,20.137,18.712,21.728V30.831h-5.443v-5.783h5.443v-3.848 c0-6.371,3.104-9.168,8.399-9.168c2.536,0,3.877,0.188,4.512,0.274v5.048h-3.612c-2.248,0-3.033,2.131-3.033,4.533v3.161h6.588 l-0.894,5.783h-5.694v15.944C38.716,45.318,47,36.137,47,25C47,12.85,37.15,3,25,3z">
                    </path>
                </svg>
            </a>
            <a href="https://www.instagram.com/explore/locations/579453845/prishtina-international-airport-adem-jashari/"
                target="_blank" aria-label="Instagram" alt="ikona e instagram">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0,0,300,250"
                    style="fill:#228BE6;">
                    <g fill="#228be6" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                        font-family="none" font-weight="none" font-size="none" text-anchor="none"
                        style="mix-blend-mode: normal">
                        <g transform="scale(5.12,5.12)">
                            <path
                                d="M16,3c-7.17,0 -13,5.83 -13,13v18c0,7.17 5.83,13 13,13h18c7.17,0 13,-5.83 13,-13v-18c0,-7.17 -5.83,-13 -13,-13zM37,11c1.1,0 2,0.9 2,2c0,1.1 -0.9,2 -2,2c-1.1,0 -2,-0.9 -2,-2c0,-1.1 0.9,-2 2,-2zM25,14c6.07,0 11,4.93 11,11c0,6.07 -4.93,11 -11,11c-6.07,0 -11,-4.93 -11,-11c0,-6.07 4.93,-11 11,-11zM25,16c-4.96,0 -9,4.04 -9,9c0,4.96 4.04,9 9,9c4.96,0 9,-4.04 9,-9c0,-4.96 -4.04,-9 -9,-9z">
                            </path>
                        </g>
                    </g>
                </svg>
            </a>
            <a href="https://x.com/airportpristina" target="_blank" aria-label="Twitter">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#1da1f2" class="icon" width="100"
                    height="100" alt="ikona e twitter">
                    <path
                        d="M24 4.557a9.83 9.83 0 01-2.828.775 4.932 4.932 0 002.165-2.724 9.86 9.86 0 01-3.127 1.195 4.917 4.917 0 00-8.384 4.482 13.945 13.945 0 01-10.124-5.13 4.916 4.916 0 001.523 6.573 4.902 4.902 0 01-2.228-.616c-.054 2.281 1.581 4.415 3.946 4.89a4.937 4.937 0 01-2.224.084 4.92 4.92 0 004.6 3.417A9.868 9.868 0 010 21.54a13.924 13.924 0 007.548 2.212c9.057 0 14.01-7.507 14.01-14.01 0-.213-.005-.425-.014-.637A10.012 10.012 0 0024 4.557z" />
                </svg>
            </a>
        </div>
    </section>

    <div id="footer-placeholder"></div>
    

</body>

</html>