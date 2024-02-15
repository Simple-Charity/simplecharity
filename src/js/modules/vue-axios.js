import axios from 'axios';

const VueAxios = axios.create({
    headers: {
        common: {
            'X-Requested-With': 'XMLHttpRequest',
            'accept': 'application/json',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
    },
});

export default VueAxios;