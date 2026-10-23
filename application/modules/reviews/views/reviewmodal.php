<!-- Review Modal -->
<div class="modal fade container custom-modal" id="rvwmdl" tabindex="-1" role="dialog" aria-labelledby="rvwmdl" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-3" class="reviews-modal-content">
            <div class="contact-form-header">
                <div class="row">
                    <div class="col-10">
                        <span class="reviews-modal-title">Leave us Feedback, Suggestion, or Complaints</span>
                    </div>
                    <div class="col-2 text-end">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" class="reviews-modal-close">
                            <span aria-hidden="true"><i class="bi bi-x-lg"></i></span>
                        </button>
                    </div>
                </div>
            </div>
            <form method="post" id="reviewsform" onsubmit="return false">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-icon">
                                <i class="bi bi-person"></i>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-icon">
                                <i class="bi bi-envelope"></i>
                                <input type="email" class="form-control" name="email" placeholder="Email Address">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-icon">
                                <i class="bi bi-chat-left-dots"></i>
                                <input type="text" class="form-control" name="title" placeholder="Review Title">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="reviews-modal-label">Ratings</label>
                            <div class="reviews-rating">
                                <input type="radio" name="stars" value="5" id="rating-5"><label for="rating-5"></label>
                                <input type="radio" name="stars" value="4" id="rating-4"><label for="rating-4"></label>
                                <input type="radio" name="stars" value="3" id="rating-3"><label for="rating-3"></label>
                                <input type="radio" name="stars" value="2" id="rating-2"><label for="rating-2"></label>
                                <input type="radio" name="stars" value="1" id="rating-1"><label for="rating-1"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="form-icon">
                                <i class="bi bi-chat-left-dotss"></i>
                                <textarea class="form-control" name="desc" rows="3" placeholder="Write Your Experience"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="image" class="form-label text-white">Add Image <small>(optional)</small></label>
                            <input type="file" name="img" class="form-control-file" class="reviews-modal-file" id="image">
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div id="result"></div>
                        <button id="submitbtn" type="submit" class="theme-btn" class="reviews-modal-submit">Submit<i class="bi bi-send"></i></button>
                        <button onclick="$('#result').html('');" type="reset"  class="theme-btn" class="reviews-modal-clear">Clear <i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
 <script type="text/javascript">
    $(function() {
        $('#submitbtn').click(function(event) {
            event.preventDefault(); // Prevent the default form submission

            var formData = new FormData($('#reviewsform')[0]); // Create a FormData object with the form's data

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('reviews/review') ?>",
                data: formData,
                contentType: false, // Important for sending multipart/form-data
                processData: false, // Prevent jQuery from automatically transforming the data into a query string
                beforeSend: function() {
                    $('#result').html('<p class="text-danger">Please wait...</p>');
                },
                success: function(data) {
                    $('#result').empty();
                    if (data.err === 0) {
                        $('#result').html("<div class='alert alert-success'><p class='text-success m-0'>Success! Thank you for your review! We appreciate your feedback and will use it to improve our services..</p></div>");
                        $("#reviewsform").trigger('reset');
                    } else {
                        $('#result').html("<div class='alert alert-danger'>" + data.msg + "</div>");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log the error to the console
                    $('#result').html('<div class="alert alert-danger">An error occurred while posting your review. Please try again later.</div>');
                }
            });
        });
    });
 </script>

 

