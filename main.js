// developer: Sujal Chaudhary(CSAI)
document.getElementById('studentForm').addEventListener('submit', async function(event) {
  event.preventDefault();

  const studentName = document.getElementById('studentName').value;
  const year = document.getElementById('year').value;
  const submitButton = document.querySelector('#studentForm button[type="submit"]');
  
  submitButton.disabled = true;

  try {
    const response = await fetch('https://api.sujal.info/nsut/rollno', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ name: studentName ,year})
    });

    const data = await response.json();

    const table = document.getElementById('responseTable');
    const tbody = table.querySelector('tbody');
    tbody.innerHTML = ''; 
    
    if(data.error){
      const row = document.createElement('tr');
      row.innerHTML = `
        <td class="py-2 px-4 border-b" colspan="6">${data.error}</td>
      `;
      tbody.appendChild(row);
    } else {
      data.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td class="py-2 px-4 border-b">${item.rollNo}</td>
          <td class="py-2 px-4 border-b">${item.email}</td>
          <td class="py-2 px-4 border-b">${item.studentName}</td>
          <td class="py-2 px-4 border-b">${item.fatherName}</td>
           <td class="py-2 px-4 border-b">${item.Degree}</td>
          <td class="py-2 px-4 border-b">${item.specialization}</td>
          <td class="py-2 px-4 border-b">${item.section}</td>
        `;
        tbody.appendChild(row);
        document.getElementById('responseMessage').classList.remove('hidden');
      });
    }

    table.classList.remove('hidden');
    table.classList.add('animate-fadeIn');
  } catch (error) {
    console.error('Error:', error);
  } finally {
    submitButton.disabled = false;
  }
});