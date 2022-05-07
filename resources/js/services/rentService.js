// Get all rents
export const fetchRents = async () => {
    const { data } = await axios.get("/api/rents");
    return data;
};

// Get single rent
export const fetchRent = async (id) => {
    const { data } = await axios.get(`/api/rents/${id}`);
    return data.data;
};

// Add new rent
export const addRent = async (rent) => {
    const config = {
        headers: {
            "Content-Type": "multipart/form-data",
        },
    };

    const { data } = await axios.post("/api/rents", rent, config);
    return data;
};

// Delete a rent
export const deleteRent = async (id) => {
    const { data } = await axios.delete(`/api/rents/${id}`);
    return data;
};

// Update a rent
export const updateRent = async (params) => {
    const config = { headers: { "Content-Type": "multipart/form-data" } };
    const { data } = await axios.post(
        `/api/rents/${params.id}`,
        params.fields,
        config
    );
    return data;
};
