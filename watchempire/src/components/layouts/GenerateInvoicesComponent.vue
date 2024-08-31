<template>
  <div>
    <div ref="pdfContent">
    </div>
    <button
      class="w-5/6 py-3 bg-teal-500 hover:bg-teal-300 duration-300"
      @click="generatePDF"
    >
      Descargar factura <i class="fas fa-donwload"></i>
    </button>
  </div>
</template>

<script>
import jsPDF from "jspdf";
import html2canvas from "html2canvas";

export default {
  methods: {
    generatePDF() {
      const content = this.$refs.pdfContent;

      html2canvas(content).then(() => {
        const pdf = new jsPDF({
          orientation: "portrait",
          unit: "pt",
          format: "a4",
        });

        pdf.setFontSize(18);
        pdf.setFont("helvetica", "bold");
        pdf.text("Factura de Compra", 40, 40);

        pdf.setFontSize(12);
        pdf.setFont("helvetica", "normal");
        pdf.text("WatchEmpire S.A.", 40, 80);
        pdf.text("Dirección: Av. Lorem Ipsum 3400 - CABA", 40, 100);
        pdf.text("Teléfono: (54 11) 9999-9999", 40, 120);
        pdf.text("Email: watchempire@email.com", 40, 140);

        const currentDate = new Date().toLocaleDateString();
        const currentTime = new Date().toLocaleTimeString();
        pdf.text(`Fecha: ${currentDate}`, 480, 60, { align: "right" });
        pdf.text(`Hora: ${currentTime}`, 480, 80, { align: "right" });

        pdf.setLineWidth(0.5);
        pdf.line(40, 160, 570, 160);

        pdf.setFontSize(14);
        pdf.text("Detalles de la Factura:", 40, 180);

        pdf.setFontSize(12);
        pdf.text("Producto", 40, 220);
        pdf.text("Cantidad", 200, 220);
        pdf.text("Precio", 320, 220);
        pdf.text("Total", 420, 220);
        

        const items = [
          { name: "Producto A", quantity: 2, price: 50, total: 100 },
          { name: "Producto B", quantity: 1, price: 150, total: 150 },
        ];

        let yPosition = 240;
        items.forEach((item) => {
          pdf.text(item.name, 40, yPosition);
          pdf.text(item.quantity.toString(), 200, yPosition);
          pdf.text(`$${item.price}`, 320, yPosition);
          pdf.text(`$${item.total}`, 420, yPosition);
          yPosition += 20;
        });

        pdf.setFontSize(14);
        pdf.text("Total:", 320, yPosition);
        pdf.text(
          `$${items.reduce((sum, item) => sum + item.total, 0)}`,
          420,
          yPosition
        );

       
        pdf.save("factura.pdf");
      });
    },
  },
};
</script>
