import React, { Component } from 'react'
import { connect } from 'react-redux'
import { Link } from 'react-router-dom'

class CategoryMenu extends Component {
    render() {
        const listMedicineGroups = this.props.medicineGroups.map((medicineGroup, i) => {
            if (medicineGroup.children.length) {
                return (
                    <li key={i} className="dropdown">
                        <Link to={{
                            pathname: `/medicine-groups/${medicineGroup.slug}/medicines`,
                            search: '?sortBy=price&type=asc&limit=12&page=1'
                        }}>{medicineGroup.name}</Link>
                        <ul className="dropdown-menu">
                            {
                                medicineGroup.children.map((child, i) => {
                                    return (
                                        <li key={i}><Link to={{
                                            pathname: `/medicine-groups/${child.slug}/medicines`,
                                            search: '?sortBy=price&type=asc&limit=12&page=1'
                                        }}>{child.name}</Link></li>
                                    )
                                })
                            }
                        </ul>
                    </li>
                )
            } else {
                return (
                    <li key={i}><Link to={{
                        pathname: `/medicine-groups/${medicineGroup.slug}/medicines`,
                        search: '?sortBy=price&type=asc&limit=12&page=1'
                    }}>{medicineGroup.name}</Link></li>
                )
            }
        })

        return (
            <div>
                <div id="category-menu" className="navbar collapse mb_40 hidden-sm-down in" aria-expanded="true" role="button">
                    <div className="nav-responsive">
                        <ul className="nav main-navigation collapse in">
                            {listMedicineGroups}
                        </ul>
                    </div>
                </div>
            </div>
        );
    }
}

const mapStateToProps = state => ({
    medicineGroups: state.medicineGroups
})

export default connect(mapStateToProps)(CategoryMenu)
