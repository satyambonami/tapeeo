<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title heading-color" id="exampleModalLabel">Edit Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <input type="hidden" name="this-id" value="0">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group border-0">
                                <select class="form-select" aria-label="Default select example" name="type" required>
                                    <option selected disabled value="0">Select Address Type</option>
                                    <option value="1">Residential</option>
                                    <option value="2">Commercial</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group border-0">
                                <input type="text" class="form-control" placeholder="Name" value="" name="name" autocomplete="off" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group border-0">
                        <input type="tel" class="form-control" placeholder="Contact" value="" name="phone" autocomplete="off" required>
                    </div>

                    <div class="form-group border-0">
                        <input type="email" class="form-control" placeholder="Your Email" value="" name="email" autocomplete="off" required>
                    </div>

                    <div class="form-group border-0">
                        <input type="text" class="form-control" placeholder="Street , House , Locality" value="" name="address" autocomplete="off" required>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group border-0">
                                <select class="form-select country" aria-label="Default select example" name="country" required>
                                    <option selected value="231">United States</option>
                                    <?php
                                        $DataCountry = mysqli_query($conn,"SELECT `id`, `name` FROM `countries`"); 
                                        while($country = mysqli_fetch_assoc($DataCountry)){
                                    ?>
                                    <option value="<?php echo $country['id'];?>"><?php echo $country['name'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group border-0">
                                <select class="form-select state" id="state" aria-label="Default select example" name="state" required >
                                    <option disabled value="0">Select State</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group border-0">
                                <select class="form-select" id="city" aria-label="Default select example" name="city" required>
                                    <option disabled value="0">Select City</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group border-0">
                                <input type="text" class="form-control" placeholder="Postal Code" value="" name="zipcode" autocomplete="off" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">

                        <div class="col-6 mt-3">
                            <a href="" class="heading-color ps-2">Clear Form Data</a>
                        </div>
                        <div class="col-6">
                            <div
                                class="submit-btn mt-2 text-start text-sm-start text-md-start text-lg-end text-xxl-end">
                                <button type="submit" class="btn btn-gradient" name="submit-address">Save</button>

                            </div>
                        </div>
                    </div>


                </form>

            </div>
            
        </div>
    </div>
</div>