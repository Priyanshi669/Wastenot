
# ♻ WasteNot – Food Redistribution Platform

*WasteNot* is our hackathon project aimed at reducing food waste by connecting food donors (restaurants, homes, businesses) with NGOs who need it.  
This digital platform enables real-time food posting, claiming, and tracking — helping bridge the gap between surplus and scarcity.

---
## 🔍 Inspiration & Research

We have extensively researched the issue of *edible food waste* and its impact on both the environment and food insecurity.  
The name *“WasteNot”* is inspired by existing real-world initiatives and open-source efforts addressing similar challenges globally.  
We’re building a simplified and localized version tailored to our hackathon use case.

---

## 🚀 What We're Building

- ✅ Donors can post excess edible food
- ✅ NGOs can view and claim food in need
- ✅ Simple login for each role (Donor/NGO)
- ✅ Dashboard showing active food availability

---

## 🧠 Why WasteNot?

Every day, tons of good food is thrown away. WasteNot provides a sustainable, software-only solution to help solve this — without IoT or physical infrastructure. It fosters a circular food economy through transparency, trust, and action.

---
## 🔥 New Feature Added: Money Donation 💸

We’ve introduced a *Money Donor* module where users can:
- Register as a donor or receiver.
- View live NGO fundraisers with progress tracking.
- Donate money directly to verified NGOs.
- Track donation history from the "My Donations" page.

### 💡 Pages Added for Money Donation:
- donation.php – Donor/Receiver role selection
- moneydonor.php – donor registration
- moneyreceiver.php- receiver registration
- donation_donor.php – View and donate to fundraisers
- donate.php – Process a single donation (by ngo_id)
- my_donations.php – Donor can track all donations
- donation_receiver – NGO can add new fundraisers (for admin/NGO role)
-

## 🔧 Tech Stack

- *Frontend:* HTML, CSS, Bootstrap
- *Backend:* PHP (Core) + MySQL
- *Database Tool:* phpMyAdmin
- *Local Server:* XAMPP

---

## 🛠 Project Status

> 🟡 MVP in Progress  
> ✅ Database schema ready  
> 🔜 Working on dashboard and authentication

---

## 🧑‍💻 Team Greenbridge

| Member | Responsibility |
|--------|----------------|
| 👩 Member 1 | Frontend Design |
| 👩 Member 2 | Authentication Logic |
| 👩 Member 3 | Database + Dashboard |
| 👩 Member 4 | Docs + GitHub + PPT |

---

 💡 Problem Statement

Millions of tons of edible food are wasted due to the lack of coordination between food donors and recipients.

---

## ✅ Proposed Solution

Build a simple platform where donors can create accounts and eventually post food details — enabling NGOs or receivers to claim surplus food.

---
## ⚙ How to Run WasteNot with XAMPP (after extracting)

### ✅ 1. Download & Set Up XAMPP

- Download from [https://www.apachefriends.org](https://www.apachefriends.org)
- Start **Apache** and **MySQL** from the XAMPP control panel

### ✅ 2. Move Project to `htdocs`

- Move your extracted folder (e.g wastenot`) to:



C:\xampp\htdocs\wastenot

`

### ✅ 3. Create Database

- Open: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
- Click **Import**, then select and upload the `schema.sql` file provided
- A new database will be created (e.g., 'donorpage')
  ### ✅ 4. Configure `db.php`

Edit `includes/db.php` as follows:

php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donorpage"
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
`

### ✅ 5. Run the Project in Browser

Open:


http://localhost/wastenot

You can now:

* Register a donor
* Log in securely
* View homepage and About Us

---

## 📌 Future Scope

* Donor-Food Listings
* Receiver-side Login & Listings View
* Admin Panel & Analytics
* Google Maps API for pickup location

---
## 📢 Credits

* Built by Team Greenbridge for hackorbit
* PHP and SQL by Member 3
* UI by Member 1


> 📌 This repo will be updated continuously throughout the hackathon.

Stay tuned as we build WasteNot — a step toward zero food waste! 💚
