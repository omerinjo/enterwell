<form class="form">
    <div class="Prijava-na-Enterwell">
        <h1> Prijava na Enterwell nagradnu igru!</h1>
    </div>
    <div class="U-ovoj-igri">
        <p> U ovoj igri svi dobivamo! Ti ćeš izraditi ovu cool formu, a mi ćemo imati priliku vidjeti tvoje zlatne linije koda
        </p>
    </div>
    <div class="container inner-shadow-rectangle">
        <image class="logo" src="<?php echo  ENTERWELL_DIR_URI . '/images/EW.svg' ?>"></image>
        <div class="row">
            <div class="col-md-6 px-0">
                <div class="dragdrop-rectangle text-center">
                    <image src=" <?php echo  ENTERWELL_DIR_URI . '/images/upload-icon.svg' ?>"></image>
                    <p>Povuci i ispusti datoteku kako bi započeo prijenos</p>
                    <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                    <div class=" dragdrop-rectangl-descr text-center">
                        <p>PODRŽANI FORMATI</p>
                        <p>pdf, png, jpg</p>
                    </div>

                </div>
                <div class="form-group">
                    <label for="number">Broj</label>
                    <input require type="text" class="form-control form-input-field" id="number">
                </div>
            </div>
            <div class="col-md-6 px-0 form-inputs">
                <div class="form-group ">
                    <label for="name">Ime</label>
                    <input type="text" class="form-control form-input-field" id="name">
                </div>
                <div class="form-group">
                    <label for="last_name">Prezime</label>
                    <input type="text" class="form-control form-input-field" id="last_name">
                </div>
                <div class="form-group">
                    <label for="street">Adresa</label>
                    <input type="text" class="form-control form-input-field" id="street">
                </div>
                <div class="form-group">
                    <label for="street_number">Kucni broj</label>
                    <input type="text" class="form-control form-input-field" id="street_number">
                </div>
                <div class="form-group">
                    <label for="city">Mjesto</label>
                    <input type="text" class="form-control form-input-field" id="city">
                </div>
                <div class="form-group">
                    <label for="post_number">Postanski broj</label>
                    <input type="text" class="form-control form-input-field" id="post_number">
                </div>
                <div class="form-group">
                    <label for="state">Drzava</label>
                    <input type="text" class="form-control form-input-field" id="state">
                </div>
                <div class="form-group">
                    <label for="phone_number">Kontakt telefon</label>
                    <input type="text" class="form-control form-input-field" id="phone_number">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control form-input-field" id="email">
                </div>
            </div>
            <image class="submit" id="submit-btn" src="<?php echo  ENTERWELL_DIR_URI . '/images/button.svg' ?>"></image>
        </div>
    </div>

</form>
<?php get_template_part('/partials/success-register-modal') ?>
<?php get_template_part('/partials/error-register-modal') ?>