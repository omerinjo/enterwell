import React, { useState, useEffect } from 'react'
import { API } from './const/url';


function index() {

    const [data, setData] = useState()
    const [offset, setOffset] = useState(0)
    const [totalRows, setTotalRows] = useState()
    const [curentRow, setCurentRow] = useState(1)

    useEffect(() => {

        fetch(`${API}/${offset}/10`).then(response => response.json())
            .then(data => {
                setData(data)
                setTotalRows(Math.ceil(parseInt(data[0].total_rows) / 10))
            })

    }, [offset])

    const handlePagination = (e) => {

        if (e.target.id == "btn-plus") {
            if (curentRow <= totalRows) {
                setCurentRow(curentRow + 1)
                offset == 0 ? setOffset(1 * 10) : setOffset(offset * 10)

            }
        } else if (e.target.id == "btn-minus") {
            if (curentRow >= totalRows) {
                setCurentRow(curentRow - 1)
                console.log("offset", offset)
                offset == 10 ? setOffset(0) : setOffset(offset / 10)
            }


        }
        console.log("eee", e.target)
    }

    console.log("data ", data)
    return (
        <div className="wrap">
            <table className="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ime</th>
                        <th scope="col">Prezime</th>
                        <th scope="col">Adresa</th>
                        <th scope="col">Kučni broj</th>
                        <th scope="col">Mjesto</th>
                        <th scope="col">Poštanski broj</th>
                        <th scope="col">Država</th>
                        <th scope="col">Kontakt telefon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Broj</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    {data ? data.map((item, index) => (

                        <tr key={index}>
                            <th scope="row">{item.ID}</th>
                            <td>{item.name}</td>
                            <td>{item.last_name}</td>
                            <td>{item.street}</td>
                            <td>{item.street_number}</td>
                            <td>{item.city}</td>
                            <td>{item.post_number}</td>
                            <td>{item.state}</td>
                            <td>{item.phone_number}</td>
                            <td>{item.email}</td>
                            <td>{item.number}</td>

                        </tr>
                    )) : null}
                </tbody>
            </table>
            <div className="row text-center">
                <div className="col-4">

                    <button onClick={handlePagination} className="btn btn-pagination btn-secondary" id="btn-minus">-</button>

                </div>
                <div className="col-4">
                    {curentRow}/{totalRows}
                </div>
                <div className="col-4">

                    <button onClick={handlePagination} className="btn btn-pagination btn-secondary" id="btn-plus">+</button>

                </div>

            </div>
        </div>

    )
}

export default index
