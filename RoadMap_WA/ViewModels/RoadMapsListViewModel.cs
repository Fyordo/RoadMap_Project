﻿using RoadMap_WA.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace RoadMap_WA.ViewModels
{
    public class RoadMapsListViewModel
    {
        /// <summary>
        /// All Road-maps of RoadMapCategory
        /// </summary>
        public IEnumerable<FullRoadMap> AllRoadMaps { get; set; }
        /// <summary>
        /// Current RM category
        /// </summary>
        public string RoadMapCategory { get; set; }
    }
}
