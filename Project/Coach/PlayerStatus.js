document.addEventListener("DOMContentLoaded", () => {
    const barData = [80, 90, 100, 60, 70, 50, 60]; // Example data for goals by season
    const barChart = document.getElementById("barChart");
  
    barData.forEach((height) => {
      const bar = document.createElement("div");
      bar.classList.add("bar");
      bar.style.height = `${height}px`;
      barChart.appendChild(bar);
    });
  });
  