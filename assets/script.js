/* php-serp-preview - script.js */
(function(){
  'use strict';
  const titulo = document.getElementById('titulo');
  const desc   = document.getElementById('desc');
  const cT     = document.getElementById('c-titulo');
  const cD     = document.getElementById('c-desc');
  const sT     = document.getElementById('serp-title');
  const sD     = document.getElementById('serp-desc');
  const sU     = document.querySelector('.serp-url');
  const urlIn  = document.getElementById('url');

  // Contadores en vivo
  if (titulo && cT) titulo.addEventListener('input', () => cT.textContent = titulo.value.length + '/60');
  if (desc && cD) desc.addEventListener('input', () => cD.textContent = desc.value.length + '/160');

  // Preview en vivo (sin enviar form)
  if (titulo && sT) titulo.addEventListener('input', () => sT.textContent = titulo.value || 'Título de ejemplo');
  if (desc && sD) desc.addEventListener('input', () => sD.textContent = desc.value || 'La descripción aparecerá aquí.');
  if (urlIn && sU) urlIn.addEventListener('input', () => sU.textContent = urlIn.value || 'https://tu-sitio.com');
})();