// Fetch Single Profile
export const fetchProfile = async (id) => {
    const { data } = await axios.get(`/api/profiles/${id}`);
    return data.data;
};

// Fetch Profile Rents
export const fetchProfileRents = async (id) => {
    const { data } = await axios.get(`/api/rents/users/${id}`);
    return data;
};

// Update a Profile
export const updateProfile = async (param) => {
    const { data } = await axios.put(
        `/api/profiles/${param.id}`,
        param.formData
    );
    return data;
};
