<!DOCTYPE html>
<html lang="en">
    <?php include('header.php') ; ?>
<?php include('graph_script.php');?>
<?php include('dbcon.php');?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Orders</title>
    <link rel="icon" href="falcon.png">

    <style>
        /* General Page Styling */
        /* body {
            font-family: 'Poppins', sans-serif;
            padding: 20px;
            max-width: 1600px; */
            /* Increased overall page width */
            /* margin: auto;
            background-color:rgb(71, 107, 95);
            color: #333;
        } */

        #loginForm {
            background: linear-gradient(to bottom right, #ffffff, #e3f2fd);
            padding: 40px 30px;
            border-radius: 16px;
            box-shadow: 0px 12px 30px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
            transition: all 0.3s ease-in-out;
        }

        #loginForm h2 {
            font-size: 26px;
            color: #007bff;
            margin-bottom: 20px;
        }

        #loginForm input {
            width: 100%;
            padding: 12px 15px;
            margin: 12px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
         .container {
        width: 90%;
        margin: auto;
        text-align: center;
        padding: 20px;
    }

        #loginForm input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
            outline: none;
        }

        #loginForm button {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            font-size: 16px;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 15px;
        }

        #loginForm button:hover {
            background-color: #0056b3;
        }

        h1 {
            text-align: left;
            color: black;
        }

       
        

               /* Admin Content */
        #adminContent {
            display: none;
            margin-top: 20px;
            width: 100%;
            max-width: 1600px;
            /* Increased width */
            margin: auto;
        }

        #loginForm {
            text-align: center;
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }

        

        /* Button Group */
        .button-group {
            display: flex;
            justify-content: center;
            gap: 12px;
        }

        /* Responsive Design */
        @media screen and (max-width: 1024px) {
            body {
                max-width: 100%;
                padding: 10px;
            }

            table {
                font-size: 14px;
                width: 100%;
                /* Full width on smaller screens */
            }

            th,
            td {
                padding: 12px;
                font-size: 14px;
            }

            button {
                padding: 8px 12px;
                font-size: 14px;
            }

            .cartTable input {
                font-size: 14px;
                padding: 6px;
            }

            .button-group {
                flex-direction: column;
                gap: 8px;
            }
        }

        @media screen and (max-width: 768px) {
            table {
                font-size: 12px;
            }

            th,
            td {
                padding: 10px;
            }

            button {
                padding: 6px 10px;
                font-size: 12px;
            }

            .cartTable input {
                font-size: 12px;
                padding: 5px;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>


</head>
<body>
        <h1 id="main_title">FALCON DYNAMIC ENGINEERING</h1>

    <form id="loginForm">
        <h2>Login</h2>
        <input type="text" id="loginUsername" placeholder="Username" required>
        <input type="password" id="loginPassword" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <!-- side navbar start -->
<div id="adminContent">
        
    <div id="sidebar">
        <div class="sidebar_content sidebar_head">
            <h1>Admin</h1>
        </div>

        <div class="sidebar_content sidebar_body">
            <nav class="side_navlinks">
                <ul>
                    <li><a href="http://localhost:8080/falcon_backend/admin-pannel-code/admin-code/admin.php">DashBoard</a></li>
                    <li><a href="http://localhost:8080/falcon_backend/crudapp/">Add Employees</a></li>
                    <li><a href="http://localhost:8080/falcon_backend/products/index.php">Add products</a></li>
                    <li><a href="http://localhost:8080/falcon_backend/admin-pannel-code/admin-code/view_orders.php">View Order's</a></li>
                   <li> <button  onclick="logout()">Logout</button></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
                    

 <!-- <div id="adminContent">
        <a href="http://localhost:8080/falcon_backend/crudapp/"  class="btn btn-success">Add Employees</a>
        <a href="http://localhost:8080/falcon_backend/products/index.php" class="btn btn-primary">Add products</a>
        <a href="view_orders.php" class="btn btn-info">View Order's</a>
        <button  class="btn btn-danger" onclick="logout()">Logout</button>
        <div class="button">
        </div> -->




    <!-- side navbar ending -->
    
    
        <!-- <h1>Admin Panel - Orders</h1> -->
        <div id="loading"></div>
        <table id="ordersTable" style="display: none;">
             <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            
         <h2>Employees data</h2>
<canvas id="myChart" style="width:100%;max-width:700px"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const fetchOrders = () => {
  // Fetch data from PHP script
  fetch("dbcon.php")
    .then(res => res.json())
    .then(data => {
      // Extract data from JSON
      console.log("Data from server:", data);
      
      // Define labels and counts
      const labels = ['Employees', 'Products']; // Labels for the pie chart
      const counts = [data.total_employees, data.total_products]; // Values for the chart

      // Create the chart
      const ctx = document.getElementById('myChart').getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'pie', // Pie chart, you can also change it to 'bar' or 'doughnut'
        data: {
          labels: labels, // Pass the labels
          datasets: [{
            label: 'Total Counts',
            data: counts, // Use the counts for employees and products
            backgroundColor: ['rgba(54, 162, 235, 0.5)', 'rgba(255, 99, 132, 0.5)'], // Color for each section
            borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'], // Border color
            borderWidth: 1
          }]
        },
        options: {
          responsive: true, // Make the chart responsive
          plugins: {
            legend: {
              position: 'top', // Legend at the top
            }
          }
        }
      });
    })
    .catch(err => {
      console.error("Error fetching data:", err); // Catch any error from the fetch call
    });
}

// Call the function after defining it
fetchOrders();
</script>



 

            <tbody></tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/pocketbase/dist/pocketbase.umd.js"></script>
    <script>
        //paste the pocketbase url here for the data
        let pb = new PocketBase('#');
        emailjs.init("w-Dv3Ne-PyKSFoGKT"); // Replace with your EmailJS public key

        const loginForm = document.getElementById('loginForm');
        const adminContent = document.getElementById('adminContent');
        const ordersTable = document.getElementById('ordersTable');
        const tableBody = ordersTable.querySelector('tbody');
        const loadingElement = document.getElementById('loading');
        // login

        const adminUsername = "admin";
        const adminPassword = "123";
        document.addEventListener("DOMContentLoaded", () => {

            // Ensure that the login form is always displayed first
            loginForm.style.display = "block";
            adminContent.style.display = "none";

            if (localStorage.getItem("adminLoggedIn") === "true") {
                loginForm.style.display = "none";
                adminContent.style.display = "block";
                fetchOrders();
            }
        });

        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const username = document.getElementById('loginUsername').value;
            const password = document.getElementById('loginPassword').value;

            if (username === adminUsername && password === adminPassword) {
                localStorage.setItem("adminLoggedIn", "true");
                // Show Admin Panel & Hide Login Form
                loginForm.style.display = "none";
                fetchOrders();

            } else {
                alert("Invalid login credentials!");
            }
        });

        function logout() {
            localStorage.removeItem("adminLoggedIn");
            // Reset UI
            adminContent.style.display = "none";
            loginForm.style.display = "block";
            
        }
       

        function formatOrderDetails(cart) {
            if (!Array.isArray(cart) || cart.length === 0) {
                return "No items in cart";
            }
            return cart.map(p => `${p.name} - ${p.description} - $${p.price} x ${p.quantity}`).join('<br>');
        }

        window.editOrder = function (orderId, cartData, totalPrice) {
            let cart = JSON.parse(decodeURIComponent(cartData));
            let cartCell = document.getElementById(`cart-${orderId}`);
            let priceCell = document.getElementById(`price-${orderId}`);

            // Convert cart details into editable input fields
            cartCell.innerHTML = cart.map((p, index) => `
        <div>
            <input type="text" id="name-${orderId}-${index}" value="${p.name}" class="editable-input">
            <input type="text" id="desc-${orderId}-${index}" value="${p.description}" class="editable-input">
            <input type="number" id="price-${orderId}-${index}" value="${p.price}" class="editable-input">
            <input type="number" id="qty-${orderId}-${index}" value="${p.quantity}" class="editable-input">
        </div>
    `).join('');

            // Make Total Price Editable
            priceCell.innerHTML = `<input type="number" id="totalPrice-${orderId}" value="${totalPrice}" class="editable-input">`;

            // Show Save button and hide Edit button
            document.getElementById(`save-${orderId}`).style.display = "inline-block";
            document.getElementById(`edit-${orderId}`).style.display = "none";
        };

        window.saveOrder = async function (orderId) {
            let cartCell = document.getElementById(`cart-${orderId}`);
            let inputs = cartCell.querySelectorAll(".editable-input");

            let updatedCart = [];
            for (let i = 0; i < inputs.length; i += 4) {
                updatedCart.push({
                    name: inputs[i].value,
                    description: inputs[i + 1].value,
                    price: parseFloat(inputs[i + 2].value),
                    quantity: parseInt(inputs[i + 3].value)
                });
            }

            let updatedTotalPrice = parseFloat(document.getElementById(`totalPrice-${orderId}`).value);

            try {
                let order = await pb.collection('orders').getOne(orderId);
                await pb.collection('orders').update(orderId, { cart: updatedCart, totalPrice: updatedTotalPrice });

                alert("Order updated successfully!");

                cartCell.innerHTML = updatedCart.map(p => `${p.name} - ${p.description} - $${p.price} x ${p.quantity}`).join('<br>');
                document.getElementById(`price-${orderId}`).innerHTML = `$${updatedTotalPrice.toFixed(2)}`;

                document.getElementById(`save-${orderId}`).style.display = "none";
                document.getElementById(`edit-${orderId}`).style.display = "inline-block";

                // Show Send Email Button & Pass Correct Data
                document.getElementById(`sendEmail-${orderId}`).style.display = "inline-block";
                document.getElementById(`sendEmail-${orderId}`).onclick = function () {
                    sendConfirmationEmail(orderId, order.email, order.name, order.address, order.phone, updatedCart, updatedTotalPrice);
                };
            } catch (err) {
                console.error("Error updating order:", err);
                alert("Failed to update order. Please try again.");
            }
        };
        // deleteOrder

        window.deleteOrder = async function (orderId) {
            await pb.collection('orders').delete(orderId);
            alert("Order deleted successfully!");
            fetchOrders();
        };
        window.sendConfirmationEmail = async function (orderId, email, userName, userAddress, userPhone, cart, totalPrice) {
            if (!email || email.trim() === "") {
                alert("No valid email found for this order!");
                return;
            }
            // Convert order items into a readable format
            let orderItems = cart.map(item => `${item.name} - ${item.description} - $${item.price} x ${item.quantity}`).join('\n');
            let emailParams = {
                to_email: email,
                order_id: orderId,
                user_name: userName,
                user_address: userAddress,
                user_phone: userPhone,
                order_items: orderItems,
                total_price: totalPrice
            };
            try {
                await emailjs.send("service_f694btt", "template_rdr3pmm", emailParams);
                alert("Confirmation email sent successfully to " + email);
            } catch (err) {
                console.error("Error sending email:", err);
                alert("Failed to send confirmation email.");
            }
        };
        // Automatically refresh orders every 10 seconds
        setInterval(() => {
            if (localStorage.getItem("adminLoggedIn") === "true") {
                fetchOrders();
            }
        }, 10000);
        </script>
        <?php include('footer.php') ; ?>
            <script src="./main.js"></script>

    </body>

</html>