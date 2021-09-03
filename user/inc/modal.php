<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title heading-color" id="exampleModalLabel">Edit Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="">
                    <input type="hidden" name="this-id" value="0">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group border-0">
                                <input type="text" class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group border-0">
                                <input type="text" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group border-0">
                        <input type="tel" class="form-control" placeholder="Contact">
                    </div>

                    <div class="form-group border-0">
                        <input type="email" class="form-control" placeholder="Your Email">
                    </div>

                    <div class="form-group border-0">
                        <input type="text" class="form-control" placeholder="Street , House , Locality">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group border-0">
                                <input type="text" class="form-control" placeholder="City">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group border-0">
                                <input type="text" class="form-control" placeholder="Postal Code">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group border-0">
                                <input type="text" class="form-control" placeholder="State">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group border-0">
                            <select class="form-select" aria-label="Default select example">
                                <option selected disabled value="0">Select Country</option>
                                <?php $countryQuery = mysqli_query($conn, "SELECT `id`,`name` FROM `countries` ");  ?>
                            </select>
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
                                <a href="" class="btn btn-gradient">Send Message</a>

                            </div>
                        </div>
                    </div>


                </form>

            </div>
            
        </div>
    </div>
</div>