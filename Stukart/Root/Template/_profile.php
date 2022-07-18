<!--Profile section-->
<div id="containerProfile">
    <div class="main">
        <div class="row">
            <div class="col-md-4 mt-1">
                <div class="card text-center sidebar">
                    <div id="profileImage">
                        <img src="./assets/profile.png" class="rounded-circle" width="300">

                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-1">
                <div class="card mb-3 content">
                    <h1 class="m-3 pt-3">About</h1>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Full Name</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                <?php echo $user_profile['name']?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Email</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                <?php echo $user_profile['email']?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Phone</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                <?php echo $user_profile['phone']?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Age</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                <?php echo $user_profile['age']?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Gender</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                <?php echo $user_profile['gender']?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>City</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                <?php echo $user_profile['city']?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Pincode</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                                <?php echo $user_profile['pincode']?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<!--!Profile section-->