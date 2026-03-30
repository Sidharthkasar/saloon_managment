let bookings=[

{
name:"Riya Sharma",
phone:"9876543210",
service:"Haircut + Facial",
date:"20 Mar",
status:"Completed"
},

{
name:"Priya Patel",
phone:"8765432109",
service:"Hair Spa",
date:"21 Mar",
status:"Pending"
},

{
name:"Neha Verma",
phone:"9988776655",
service:"Makeup",
date:"22 Mar",
status:"Completed"
}

];


let table=document.getElementById("bookingTable");

bookings.forEach(function(b){

let row=`

<tr>

<td>${b.name}</td>
<td>${b.phone}</td>
<td>${b.service}</td>
<td>${b.date}</td>
<td class="${b.status=='Completed'?'status-done':'status-pending'}">

${b.status}

</td>

</tr>

`;

table.innerHTML+=row;

});

function toggleMenu(){

let menu = document.getElementById("adminMenu");

if(menu.style.display==="block"){
menu.style.display="none";
}else{
menu.style.display="block";
}

}

/* notification count */

let newBookings = 3;

document.getElementById("notifyCount").innerText = newBookings;

/* ALL BOOKINGS DATA */

let allBookings=[

{
id:"PHX-1000",
name:"vaishnavi ambale",
phone:"7499620221",
datetime:"Thu, 5 Mar 2026 7:00 PM",
services:"Face Cleanup, Eyebrow, Step Cut",
amount:"₹600",
status:"Confirmed"
}

];

let bookingBody=document.getElementById("allBookings");

function loadBookings(){

bookingBody.innerHTML="";

allBookings.forEach(function(b){

let row=`

<tr>

<td>${b.id}</td>
<td>${b.name}</td>
<td>${b.phone}</td>
<td>${b.datetime}</td>
<td>${b.services}</td>
<td>${b.amount}</td>

<td>
<span class="status-confirmed">${b.status}</span>
</td>

<td>
<button class="cancel-btn">Cancel</button>
</td>

</tr>

`;

bookingBody.innerHTML+=row;

});

}

loadBookings();



/* SEARCH FUNCTION */

document.getElementById("searchBooking").addEventListener("keyup",function(){

let value=this.value.toLowerCase();

let rows=document.querySelectorAll("#allBookings tr");

rows.forEach(function(row){

let text=row.innerText.toLowerCase();

row.style.display=text.includes(value)?"":"none";

});

});s

/* STAFF DATA */

let staffData=[

{
staff:"Aarti",
customer:"Riya Sharma",
service:"Facial",
amount:"₹500"
},

{
staff:"Sneha",
customer:"Priya Patel",
service:"Hair Spa",
amount:"₹800"
},

{
staff:"Pooja",
customer:"Neha Verma",
service:"Makeup",
amount:"₹1500"
}

];

let staffTable=document.getElementById("staffTable");

staffData.forEach(function(s){

let row=`

<tr>
<td>${s.staff}</td>
<td>${s.customer}</td>
<td>${s.service}</td>
<td>${s.amount}</td>
</tr>

`;

staffTable.innerHTML+=row;

});