const booking = JSON.parse(localStorage.getItem("latestBooking"));

document.getElementById("bid").innerText = booking.id;
document.getElementById("bname").innerText = booking.name;
document.getElementById("bphone").innerText = booking.phone;
document.getElementById("bdate").innerText = booking.date;
document.getElementById("btime").innerText = booking.time;
document.getElementById("btotal").innerText = booking.total;

let serviceHTML="";

booking.services.forEach(s=>{
serviceHTML += `<p>${s.name} - ₹${s.price}</p>`;
});

document.getElementById("serviceList").innerHTML = serviceHTML;


function downloadPDF(){

const { jsPDF } = window.jspdf;

const doc = new jsPDF();

doc.setFontSize(18);
doc.text("Phoenix Salon Booking",20,20);

doc.setFontSize(12);

doc.text("Booking ID: "+booking.id,20,40);
doc.text("Name: "+booking.name,20,50);
doc.text("Phone: "+booking.phone,20,60);
doc.text("Date: "+booking.date,20,70);
doc.text("Time: "+booking.time,20,80);

let y=100;

booking.services.forEach(s=>{
doc.text(`${s.name} - ₹${s.price}`,20,y);
y+=10;
});

doc.text("Total: ₹"+booking.total,20,y+10);

doc.save("Phoenix-Booking.pdf");

}



function sendWhatsApp(){

let text = `Phoenix Salon Booking
Booking ID: ${booking.id}
Name: ${booking.name}
Date: ${booking.date}
Time: ${booking.time}
Total: ₹${booking.total}`;

let url = `https://wa.me/?text=${encodeURIComponent(text)}`;

window.open(url);

}