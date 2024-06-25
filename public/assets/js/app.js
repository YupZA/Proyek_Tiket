document.addEventListener('alpine:init', () => {
    Alpine.data('tikets', () => ({
        items: [
            { id: 1, name: 'Seminar', img: 'assets/img/Poster Sendikom 2024.png', price: 100000 },
        ],
    }));

    Alpine.store('cart', {
        items: [],
        total: 0,
        quantity: 0,
        add(newItem) {
            // cek apakah ada barang sama
            const cartItem = this.items.find((item) => item.id === newItem.id);

            // cart kosong
            if(!cartItem){
                this.items.push({...newItem, quantity: 1, total: newItem.price});
                this.quantity++;
                this.total += newItem.price;
            } else{
                //apakah barang beda atau sama
                this.items = this.items.map((item) => {
                    //jika barang beda
                    if(item.id !== newItem.id) {
                        return item;
                    } else{
                        // jika barang sdh ada, tambah quantuuty
                        item.total = item.price * item.quantity;
                        this.quantity++;
                        this.total += item.price;
                        return item;
                    }
                });
            }

            // console.log(this.total);

            // this.items.push(newItem);
            // this.total += newItem.price;
            // this.quantity++;
        },
        remove(index) {
            this.total -= this.items[index].price;
            this.items.splice(index, 1);
            this.quantity--;
        },
    });
});

const checkoutButton = document.querySelector('.checkout-button');
const form = document.querySelector('#checkoutForm')

//kirim data tombol sheckout
checkoutButton.addEventListener('click', function(e){
    e.preventDefault();
    const formData = new FormData(form);
    const data = new URLSearchParams(formData);
    const objData = Object.fromEntries(data);
    const message = formatMessage(objData);
    window,open('http://wa.me/6285654953238?text=' + encodeURIComponent(message));
});

// format pesan wa
const formatMessage = (obj) => {
    return `Data Customer
        Nama : ${obj.nama}
        Telpon : ${obj.telpon}
    Data Pesanan
        ${JSON.parse(obj.items).map((item) => `${item.name} (${item.quantity} x ${item.total}) \n`)}
    TOTAL: ${obj.total}
    Terima Kasih...`;
};

