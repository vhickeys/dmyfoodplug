<div class="offcanvas offcanvas-end customeoff" tabindex="-1" id="offcanvasExample">
    <div class="offcanvas-header">
        <h5 class="modal-title" id="#gridSystemModal">Add Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="container-fluid">
            <div>
                <label>Profile Picture</label>
                <div class="dz-default dlab-message upload-img mb-3">
                    <form action="#" class="dropzone">
                        <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M20.5 20V35" stroke="#DADADA" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M34.4833 30.6501C36.1088 29.7638 37.393 28.3615 38.1331 26.6644C38.8731 24.9673 39.027 23.0721 38.5703 21.2779C38.1136 19.4836 37.0724 17.8926 35.6111 16.7558C34.1497 15.619 32.3514 15.0013 30.4999 15.0001H28.3999C27.8955 13.0488 26.9552 11.2373 25.6498 9.70171C24.3445 8.16614 22.708 6.94647 20.8634 6.1344C19.0189 5.32233 17.0142 4.93899 15.0001 5.01319C12.9861 5.0874 11.015 5.61722 9.23523 6.56283C7.45541 7.50844 5.91312 8.84523 4.7243 10.4727C3.53549 12.1002 2.73108 13.9759 2.37157 15.959C2.01205 17.9421 2.10678 19.9809 2.64862 21.9222C3.19047 23.8634 4.16534 25.6565 5.49994 27.1667"
                                stroke="#DADADA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="fallback">
                            <input name="file" type="file" multiple>

                        </div>
                    </form>
                </div>
            </div>
            <form>
                <div class="row">
                    <div class="col-xl-6 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Employee ID <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Employee Name<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="">
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Employee Email<span
                                class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="">
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label for="exampleFormControlInput4" class="form-label">Password<span
                                class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="exampleFormControlInput4" placeholder="">
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">Designation<span class="text-danger">*</span></label>
                        <select class="default-select form-control">
                            <option data-display="Select">Please select</option>
                            <option value="html">Software Engineer</option>
                            <option value="css">Civil Engineer</option>
                            <option value="javascript">Web Doveloper</option>
                        </select>
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">Department<span class="text-danger">*</span></label>
                        <select class="default-select form-control">
                            <option data-display="Select">Please select</option>
                            <option value="html">Software</option>
                            <option value="css">Doit</option>
                            <option value="javascript">Designing</option>
                        </select>
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">Country<span class="text-danger">*</span></label>
                        <select class="default-select form-control">
                            <option data-display="Select">Please select</option>
                            <option value="html">Ind</option>
                            <option value="css">USA</option>
                            <option value="javascript">UK</option>
                        </select>
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label for="exampleFormControlInput88" class="form-label">Mobile<span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="exampleFormControlInput88" placeholder="">
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">Gender<span class="text-danger">*</span></label>
                        <select class="default-select form-control">
                            <option data-display="Select">Please select</option>
                            <option value="html">Male</option>
                            <option value="css">Female</option>
                            <option value="javascript">Other</option>
                        </select>
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label for="exampleFormControlInput99" class="form-label">Joining Date<span
                                class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="exampleFormControlInput99">
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label for="exampleFormControlInput8" class="form-label">Date of Birth<span
                                class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="exampleFormControlInput8">
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label for="exampleFormControlInput10" class="form-label">Reporting To<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleFormControlInput10" placeholder="">
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">Language Select<span class="text-danger">*</span></label>
                        <select class="default-select form-control">
                            <option data-display="Select">Please select</option>
                            <option value="html">English</option>
                            <option value="css">Hindi</option>
                            <option value="javascript">Canada</option>
                        </select>
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">User Role<span class="text-danger">*</span></label>
                        <select class="default-select form-control">
                            <option data-display="Select">Please select</option>
                            <option value="html">Parmanent</option>
                            <option value="css">Parttime</option>
                            <option value="javascript">Per Hours</option>
                        </select>
                    </div>
                    <div class="col-xl-12 mb-3">
                        <label class="form-label">Address<span class="text-danger">*</span></label>
                        <textarea rows="2" class="form-control"></textarea>
                    </div>
                    <div class="col-xl-12 mb-3">
                        <label class="form-label">About<span class="text-danger">*</span></label>
                        <textarea rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary me-1">Help Desk</button>
                    <button class="btn btn-danger light ms-1">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end customeoff" tabindex="-1" id="addNewUser">
    <div class="offcanvas-header">
        <h5 class="modal-title" id="#gridSystemModal1">Add a New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="container-fluid">
            <div id="adminAlert">
                Alert Message here..
            </div>
            <form id="adminSignup" name="adminform">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="adminFname" class="form-label">Full Name<span class="text-danger">*</span></label>
                        <input id="adminFname" name="firstname" type="text" class="form-control"
                            placeholder="Full Name">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Email<span class="text-danger">*</span></label>
                        <input id="adminEmail" name="email" type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Password<span class="text-danger">*</span></label>
                        <input id="adminPassword" name="password" type="password" class="form-control"
                            placeholder="Password">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Confirm Password<span class="text-danger">*</span></label>
                        <input id="adminConfirm" name="confirmPass" type="password" class="form-control"
                            placeholder="Password">
                    </div>
                    <div class="col-xl-12 mb-5">
                        <label class="form-label">Role<span class="text-danger">*</span></label>
                        <select class="default-select form-control" id="role" name="role" required>
                            <option data-display="Select">Slect User Role</option>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                            <option value="2">Super Admin</option>
                        </select>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary w-100" id="adminSignupSubmit" type="submit"
                        name="adminform_btn">Create User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end customeoff" tabindex="-1" id="changePassword">
    <div class="offcanvas-header">
        <h5 class="modal-title" id="#gridSystemModal1">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="container-fluid">
            <div class="adminAlert">
                Alert Message here..
            </div>
            <form>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <input type="hidden" name="userId" id="userId" value="<?= $_SESSION['user_data']['userId'] ?>" class="form-control">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Old Password<span class="text-danger">*</span></label>
                        <input id="old_password" type="password" name="old_password" class="form-control" placeholder=" Enter your old password">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">New Password<span class="text-danger">*</span></label>
                        <input id="new_password" type="password" name="new_password" class="form-control"
                            placeholder="Enter a New Password">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Confirm Password<span class="text-danger">*</span></label>
                        <input id="confirm_password" type="password" name="confirm_password" class="form-control"
                            placeholder="Confirm New Password">
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary w-100" id="adminPasswordChange" type="submit"
                        name="adminform_btn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel1">Invite Employee</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <label class="form-label">Email ID<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" placeholder="hello@gmail.com">
                        <label class="form-label mt-3">Employment date<span class="text-danger">*</span></label>
                        <input class="form-control" type="date">
                        <div class="row">
                            <div class="col-xl-6">
                                <label class="form-label mt-3">First Name<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label mt-3">Last Name<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Surname">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 invite">
                            <label class="form-label">Send invitation email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control " placeholder="+ invite">
                        </div>


                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright © Dammy Foodplug <?= date("Y") ?></p>
    </div>
</div>
<!--**********************************
            Footer end
        ***********************************-->

<!--**********************************
           Support ticket button start
        ***********************************-->

<!--**********************************
           Support ticket button end
        ***********************************-->


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->