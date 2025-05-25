# UEB24-25_Gr3
Projekti WEB I - Airport Website - HTML, CSS, JavaScript, JQuery

Punuan:
Olsa Domi
Rreze Ejupi
Olti Krasniqi
Bleron Baftiu
Valmir Mustafa

Webfaqja e Aeroportit permban 6 nenfaqe:
  - Ballina
  - Fluturime
  - Sherbimet
  - Lajme
  - Rreth Nesh
  - Kontakt

Puna eshte ndare ne 5 branches; ku per secilin anetar te grupit ekziston branch-i specifik.
Konkretisht, secili eshte fokusuar ne pjese te caktuara te webfaqes. Per identifikim me te lehte te pjeseve perkatese te punuara, po i cekim me poshte:
  - Olti --> Ballina & Nav-Bar
  - Olsa --> Sherbimet & Kontakti
  - Rrezja --> Rreth Nesh & Footer
  - Bleroni --> Lajme
  - Valmiri --> Fluturime
----------------------------------------------------------------------------
# UEB25_Gr3 - VAZHDIMI - PHP
Projekti WEB II - Airport Website
Në fazën e dytë të projektit **"Airport Website"**, kemi avancuar funksionalitetet e faqes për të plotësuar kërkesat e lidhjes me bazën e të dhënave dhe për të shtuar elemente të reja të menaxhimit dhe personalizimit të përvojës së përdoruesve.

---

## Funksionalitetet e Implementuara

✅ **Lidhja me bazën e të dhënave (MySQL)**  
- Ruajtja dhe menaxhimi i të dhënave dinamike të faqes.

✅ **Sistemi i autentifikimit (login/signup)**  
- Përdoruesit mund të regjistrohen dhe të kyçen për të pasur qasje në funksionalitete të personalizuara.

✅ **Superadmin Dashboard**  
- Superadmin-i (i futur statikisht për demonstrim) ka akses në:
  - Menaxhimin e lajmeve.
  - Menaxhimin e kontakteve të përdoruesve.
  - Menaxhimin e newsletter-it.
  - Menaxhimin e kontaktimeve për makinat me qira.
  - Menaxhimin e sponsorëve.

✅ **Shfaqja dinamike e të dhënave**  
- Të dhënat e ruajtura si lajmet dhe sponsorët shfaqen automatikisht për përdoruesit në seksionet përkatëse të faqes.

✅ **Dërgimi i e-maileve me PHPMailer**  
- Funksionaliteti i dërgimit të e-maileve për:
  - Seksionin e kontaktit.
  - Rezervimin e makinave me qira.
  - Pagesën e parkingut.
  - Newsletter.
- **Detaj teknik**:  
  Përdorimi i **`$mail->Host = 'smtp.ethereal.email'`** për simulimin e e-maileve në ambientin e zhvillimit.

✅ **Menaxhimi sipas rolit të përdoruesve**  
- **Pagesa dhe rezervimi i parkingut**: Vetëm për përdoruesit e kyçur.  
- **Kontaktet dhe newsletter**: Qasshme edhe për përdoruesit pa llogari (guests).

---

## Teknologjitë Shtesë të Përdorura

- **Cookies**: Për menaxhimin e lajmeve.
- **Web API**: Për integrimin e tabelës së fluturimeve.
- **Sessions**: Për regjistrimin e numrit të vizitorëve dhe për identifikimin e përdoruesve të kyçur (admin ose vizitor).
- **AJAX**: Për plotësimin e formularëve në mënyrë më të shpejtë dhe të rrjedhshme.

---

## Rezultati

Kjo fazë e dytë ka bërë që faqja e aeroportit të jetë shumë më interaktive, dinamike dhe e përshtatur për nevojat e përdoruesve të ndryshëm.

---

🎯 Për më shumë informacion ose për kontribut, kontaktoni ekipin tonë!

