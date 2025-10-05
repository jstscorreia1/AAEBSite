// carrosselFotos.js

document.addEventListener("DOMContentLoaded", function () {
    const hoje = new Date();
    const ano = hoje.getFullYear();
    const mes = String(hoje.getMonth() + 1).padStart(2, '0');
    const dia = String(hoje.getDate()).padStart(2, '0');
  
    const basePath = `img/${ano}/${mes}/${dia}/`;
  
    const carouselContent = document.getElementById('carouselContent');
  
    for (let i = 1; i <= 10; i++) {
      const imgSrc = `${basePath}foto${i}.jpeg`;
      const isActive = i === 1 ? 'active' : '';
  
      const item = document.createElement('div');
      item.className = `carousel-item ${isActive}`;
  
      const img = document.createElement('img');
      img.src = imgSrc;
      img.className = 'd-block w-100';
      img.alt = `Foto ${i}`;
  
      item.appendChild(img);
      carouselContent.appendChild(item);
    }
  });
  