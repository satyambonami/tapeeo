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
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-6">
                            <div class="form-group border-0">
                                <select class="form-select" aria-label="Default select example" name="type" required>
                                    <option selected disabled value="0">Select Address Type</option>
                                    <option value="1">Residential</option>
                                    <option value="2">Commercial</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-6">
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
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-6">
                            <div class="form-group border-0">
                                <select class="form-select country" aria-label="Default select example" name="country" >
                                    <option selected disabled value="231">United States</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-6">
                            <div class="form-group border-0">
                                <select class="form-select state" id="state" aria-label="Default select example" name="state" >
                                <option selected disabled value="0">Select State</option>
                                <?php
                                    $DataState = mysqli_query($conn,"SELECT `id`, `name` FROM `states`"); 
                                    while($State = mysqli_fetch_assoc($DataState)){
                                ?>
                                <option value="<?php echo $State['id'];?>" ><?php echo $State['name'];?></option>
                                <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-6">
                            <div class="form-group border-0">
                                <select class="form-select" id="city" aria-label="Default select example" name="city" >
                                    <option selected disabled value="0">Select City</option>
                                    <?php
                                        $Datacity = mysqli_query($conn,"SELECT `id`, `name` FROM `cities`"); 
                                        while($City = mysqli_fetch_assoc($Datacity)){
                                    ?>
                                    <option value="<?php echo $City['id'];?>" ><?php echo $City['name'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-6">
                            <div class="form-group border-0">
                                <input type="text" class="form-control" placeholder="Postal Code" value="" name="zipcode" autocomplete="off" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12 text-end ">
                            <div
                                class="submit-btn mt-2 text-end text-sm-end text-md-end text-lg-end text-xxl-end">
                                <button type="submit" class="btn btn-gradient" name="submit-address">Save</button>

                            </div>
                        </div>
                    </div>


                </form>

            </div>
            
        </div>
    </div>
</div>