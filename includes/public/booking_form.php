<?php
// booking_form.php
?>
<div>
    <form method="post" action="" id="booking-form">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="booking-date">Date:</label>
        <input type="date" name="booking_date" id="booking-date" required>

        <label for="booking-time">Time:</label>
        <input type="time" name="booking_time" id="booking-time" required>

        <input type="submit" name="submit_booking" value="Submit">

    </form>

    <div id="modal-overlay" >
        <article id="booking-modal">
            <!-- Content of the modal -->
            <div id="button-holder" >
                <button class="close ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </button>
            </div>
            <h5>Booking Confirmed</h5>
            <p id="modal-data"></p>

        </article>
    </div>

    <script>

        var form = document.querySelector("#booking-form");

        const postData = (event) => {
            event.preventDefault();
            var formData = new FormData(form);

            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=booking_process&' + new URLSearchParams(formData).toString(),
            })
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {

                    // show a modal with the confirmation details
                    if (data.data) {
                        showBookingData(data.data);
                    }

                    // Reset the form
                    form.reset();
                })
                .catch(function (error) {
                    alert('An error occurred while submitting the booking. Please try again later.');
                });
        };

        form.addEventListener('submit', postData, false);



        function showBookingData(bookingData) {
            // Get the modal element
            var modal = document.querySelector('#modal-overlay');

            // Get the <span> element that closes the modal
            var closeButton = modal.querySelector('.close');

            // Get the element to display the booking data
            var modalData = modal.querySelector('#modal-data');

            // Clear existing content
            modalData.innerHTML = '';

            // Iterate over the booking data and display each field
            for (var key in bookingData) {
                if (bookingData.hasOwnProperty(key)) {
                    var field = document.createElement('p');
                    field.innerHTML = '<strong>' + key + ':</strong> ' + bookingData[key];
                    modalData.appendChild(field);
                }
            }

            // Display the modal
            modal.style.display = 'flex';

            // Close the modal when the user clicks on the close button
            closeButton.addEventListener('click', function () {
                modal.style.display = 'none';
            });

            // Close the modal when the user clicks outside the modal
            window.addEventListener('click', function (event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });
        }

    </script>

    <style>
        #modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 50;
            height: 100vh;
            justify-content: center;
            align-items: center;
            width: 100%;
            backdrop-filter: blur(2px);
            background-color: rgba(0, 0, 0, 0.5);
        }

        #button-holder {
            display: flex;
            justify-content: end;

        }

        #booking-modal {

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            border-radius: 0.375rem;
            gap: 0.25rem;
            padding: 1rem;


        }

        #booking-modal h5 {
            color: green; 
        }

        

        .close {
            color: white;
            color: red;
            font-weight: bold;
            cursor: pointer;
            margin-right: 0px;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border: 0;
        }

        #booking-modal .close:hover {
            color: #999;
        }

        #booking-form {
            display: flex;
            flex-direction: column;
            max-width: 300px;
            margin: 0 auto;
        }

        #booking-form label {
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        #booking-form input[type="text"],
        #booking-form input[type="email"],
        #booking-form input[type="date"],
        #booking-form input[type="time"] {
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #90a4ae;
            border-radius: 4px;
        }

        #booking-form input[type="submit"] {
            background-color: blue;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #booking-form input[type="submit"]:hover {
            background-color: #42a5f5;
            
        }
    </style>

</div>