<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Orders</title>
    <link rel="icon" href="falcon.png">

    <style>
        /* General Page Styling */
        body {
            font-family: 'Poppins', sans-serif;
            padding: 20px;
            max-width: 1600px;
            /* Increased overall page width */
            margin: auto;
            background-color: #f4f7f6;
            color: #333;
        }

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
            text-align: center;
            color: #007bff;
            font-weight: bold;
        }

        /* Table Styling */
        table {
            width: 95%;
            /* Increased width */
            max-width: 1500px;
            /* Maximum width for readability */
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-left: auto;
            margin-right: auto;
        }

        th,
        td {
            padding: 15px;
            /* Increased padding */
            border-bottom: 1px solid #ddd;
            text-align: left;
            font-size: 16px;
            /* Larger text */
            color: #444;
        }

        th {
            background-color: #f5f7fa;
            color: #555;
            text-align: left;
            font-weight: 600;
        }

        tr {
            background-color: white;
            transition: 0.3s ease;
        }

        tr:hover {
            background-color: #f1f3f5;
        }

        /* Checkboxes */
        th:first-child,
        td:first-child {
            width: 50px;
            text-align: center;
        }

        input[type="checkbox"] {
            transform: scale(1.2);
            cursor: pointer;
        }

        /* Buttons */
        button {
            padding: 10px 14px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s ease;
        }

        .editOrder {
            background-color: #ffc107;
            color: black;
        }

        .editOrder:hover {
            background-color: #e0a800;
        }

        .deleteOrder {
            background-color: red;
            color: white;
        }

        .deleteOrder:hover {
            background-color: darkred;
        }

        .saveOrder {
            background-color: #28a745;
            color: white;
            display: none;
        }

        .saveOrder:hover {
            background-color: #218838;
        }

        #logoutBtn {
            background-color: #dc3545;
            color: white;
            padding: 12px 18px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease;
            display: block;
            margin: 20px auto;
        }

        #logoutBtn:hover {
            background-color: #c82333;
        }

        /* Editable Inputs */
        .editable-input {
            width: 100%;
            max-width: 250px;
            padding: 10px 12px;
            text-align: left;
            border: 1px solid #ced4da;
            border-radius: 8px;
            font-size: 15px;
            background-color: #ffffff;
            margin: 8px 0;
            transition: all 0.3s ease;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.06);
        }

        .editable-input:focus {
            border-color: #007bff;
            background-color: #f0f8ff;
            box-shadow: 0 0 6px rgba(0, 123, 255, 0.2);
            outline: none;
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

        #loading {
            text-align: center;
            font-weight: bold;
            padding: 12px;
            background: #fff;
            border-radius: 5px;
            margin-top: 10px;
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
    
    <h1 id="pageTitle">Falcon Dynamic Admin Login</h1>

    <form id="loginForm">
        <h2>Login</h2>
        <input type="text" id="loginUsername" placeholder="Username" required>
        <input type="password" id="loginPassword" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <div id="adminContent">
        <a href="http://localhost:8080/falcon_backend/crudapp/" id="logoutBtn">Add Employees</a>
        <button id="logoutBtn" onclick="logout()">Logout</button>
        <button type="submit" onclick="add_products.php">add products</button>
        <h1>Admin Panel - Orders</h1>
        <div id="loading">Loading orders...</div>
        <table id="ordersTable" style="display: none;">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>State</th> <!-- New Field -->
                    <th>Zone Code</th> <!-- New Field -->
                    <th>Order Details</th>
                    <th>Total Price</th>
                    <th>Order Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

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
                adminContent.style.display = "block";
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
        // async function fetchOrders() {
        //     try {
        //         loadingElement.style.display = "block";
        //         let orders = await pb.collection('orders').getFullList();
        //         orders.sort((a, b) => new Date(b.orderDate) - new Date(a.orderDate));

        //         tableBody.innerHTML = '';
        //         loadingElement.style.display = "none";

        //         orders.forEach(order => {
        //             const row = document.createElement('tr');
        //             row.innerHTML = `
        //         <td>${order.id}</td>
        //         <td>${order.name}</td>
        //         <td>${order.email}</td>
        //         <td>${order.phone}</td>
        //         <td>${order.address}</td>
        //         <td>${order.state || 'N/A'}</td>   <!-- Fetch State -->
        //         <td>${order.zonecode}</td> <!-- Fetch Zone Code -->
        //         <td id="cart-${order.id}">${formatOrderDetails(order.cart)}</td>
        //         <td id="price-${order.id}">$${order.totalPrice.toFixed(2)}</td>
        //         <td>${new Date(order.orderDate).toLocaleString()}</td>
        //         <td class="button-group">
        //             <button class="editOrder" id="edit-${order.id}" onclick="editOrder('${order.id}', '${encodeURIComponent(JSON.stringify(order.cart))}', ${order.totalPrice})">Edit</button>
        //             <button class="deleteOrder" onclick="deleteOrder('${order.id}')">Delete</button>
        //             <button class="saveOrder" id="save-${order.id}" style="display:none" onclick="saveOrder('${order.id}')">Save</button>
        //             <button class="sendEmail" id="sendEmail-${order.id}" style="display:none" onclick="sendConfirmationEmail('${order.id}', '${order.email}')">Send Email</button>
        //         </td>
        //     `;
        //             tableBody.appendChild(row);
        //         });

        //         ordersTable.style.display = 'table';
        //     } catch (err) {
        //         console.error('Error fetching orders:', err);
        //         alert("Failed to fetch orders. Make sure PocketBase is running!");
        //     }
        // }

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
    </body>

</html>