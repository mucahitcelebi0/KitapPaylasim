document.addEventListener('DOMContentLoaded', function() {
    yorumlariYukle();
    aramaMotoru();
});

function yorumlariYukle() {
    fetch('get_reviews.php')
        .then(response => response.json())
        .then(data => {
            const yorumlarContainer = document.getElementById('yorumlar-listesi');
            yorumlarContainer.innerHTML = ''; // Mevcut içerikleri temizle
            data.forEach(yorum => {
                const yorumItem = document.createElement('div');
                yorumItem.classList.add('yorum-item');
                
                yorumItem.innerHTML = `
                    <h3>${yorum.kitap_baslik}</h3>
                    <p>${yorum.yorum}</p>
                    ${yorum.resim ? `<img src="${yorum.resim}" alt="Kitap Resmi">` : ''}
                    <p><small>${yorum.kullanici_adi} - ${new Date(yorum.olusturulma_tarihi).toLocaleDateString()}</small></p>
                `;
                
                yorumlarContainer.appendChild(yorumItem);
            });
        });
}

function aramaMotoru() {
    const aramaFormu = document.getElementById('arama-formu');
    aramaFormu.addEventListener('submit', function(e) {
        e.preventDefault();
        const aramaInput = document.getElementById('arama-input').value.toLowerCase();
        fetch('get_reviews.php')
            .then(response => response.json())
            .then(data => {
                const aramaSonuclari = document.getElementById('arama-sonuclari');
                aramaSonuclari.innerHTML = '';
                const filteredResults = data.filter(yorum => yorum.kitap_baslik.toLowerCase().includes(aramaInput));
                if (filteredResults.length > 0) {
                    filteredResults.forEach(yorum => {
                        const sonucItem = document.createElement('div');
                        sonucItem.classList.add('yorum-item');
                        
                        sonucItem.innerHTML = `
                            <h3>${yorum.kitap_baslik}</h3>
                            <p>${yorum.yorum}</p>
                            ${yorum.resim ? `<img src="${yorum.resim}" alt="Kitap Resmi">` : ''}
                            <p><small>${yorum.kullanici_adi} - ${new Date(yorum.olusturulma_tarihi).toLocaleDateString()}</small></p>
                        `;
                        
                        aramaSonuclari.appendChild(sonucItem);
                    });
                } else {
                    aramaSonuclari.innerHTML = '<p>Aradığınız kitap bulunamadı.</p>';
                }
            });
    });
}
