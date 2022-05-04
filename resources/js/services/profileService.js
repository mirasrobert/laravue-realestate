export const fetchProfile = async (id) => {
    const { data } = await axios.get(`/api/profiles/${id}`);
    return data.data;
};

export const fetchProfileRents = async (id) => {
    const { data } = await axios.get(`/api/rents/users/${id}`);
    return data;
};
