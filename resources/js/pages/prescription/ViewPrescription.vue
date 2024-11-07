<template>
    <div class="prescription" id="exportPrescription" ref="exportPrescription">
        <header class="header">
            <div class="doctor-info">
                <h1>Dr. John Doe</h1>
                <p>MBBS, MD - General Medicine</p>
                <p>Cardiologist</p>
                <p>Contact: +123 456 7890 | Email: doctor@example.com</p>
            </div>
            <div class="clinic-info">
                <p><strong>City Clinic</strong></p>
                <p>123 Main St, Cityville</p>
                <p>Phone: +123 456 7890</p>
            </div>
        </header>
        
        <section class="patient-info">
            <p><strong>Patient Name:</strong> ____________________</p>
            <p><strong>Age:</strong> _______ <strong>Gender:</strong> __________</p>
            <p><strong>Date:</strong> ____________________</p>
            <p><strong>Illness Details:</strong></p>
            <div class="details-box">_______________________________________________________</div>
        </section>

        <section class="content">
            <!-- Sidebar with Tests and Suggestions -->
            <aside class="sidebar">
                <h3>Tests</h3>
                <ul class="test-list">
                    <li>_______________________________</li>
                    <li>_______________________________</li>
                    <li>_______________________________</li>
                </ul>
                
                <h3>Doctor's Suggestions</h3>
                <ul class="suggestion-list">
                    <li>_______________________________</li>
                    <li>_______________________________</li>
                    <li>_______________________________</li>
                </ul>
            </aside>

            <!-- Main Prescription Content -->
            <div class="prescription-details">
                <h2>Prescription</h2>
                <div class="medication">
                    <p><strong>Medicine 1:</strong> ____________________</p>
                    <p><strong>Dosage:</strong> ____________________</p>
                    <p><strong>Instructions:</strong> ____________________</p>
                </div>
                <div class="medication">
                    <p><strong>Medicine 2:</strong> ____________________</p>
                    <p><strong>Dosage:</strong> ____________________</p>
                    <p><strong>Instructions:</strong> ____________________</p>
                </div>
                <div class="medication">
                    <p><strong>Medicine 3:</strong> ____________________</p>
                    <p><strong>Dosage:</strong> ____________________</p>
                    <p><strong>Instructions:</strong> ____________________</p>
                </div>
            </div>
        </section>

        <footer class="footer">
            <p><strong>Doctor's Signature:</strong> ____________________</p>
            <p>Powered by Doctor Prescription System</p>
        </footer>
    </div>
</template>

<script type="text/babel">
export default {
    props: ['data']
}
</script>