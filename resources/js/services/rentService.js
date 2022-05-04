// Get all rents
export const fetchRents = async () => {
    const { data } = await axios.get("/api/rents");
    return data;
};

// Get single rent
export const fetchRent = async (id) => {
    const { data } = await axios.get(`/api/rents/${id}`);
    return data;
};
